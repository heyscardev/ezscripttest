<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\BookInventory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy("title")->get();

        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        return view("books.create", compact("authors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            "title" => "required|max:250|string",
            "author" => "required|exists:authors,id",
            "total_inventory" => "required|integer|min:0"
        ]);
        $book  = new Book(["title" => $validatedData["title"], "author_id" => $validatedData["author"]]);
        $book->save();
        $inventory = new BookInventory([
            "total_inventory" => $validatedData["total_inventory"],
            "available_inventory" => $validatedData["total_inventory"],
            "book_id" => $book->id
        ]);
        $inventory->save();
        return redirect()->route('books.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view("books.edit", compact("book", "authors"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedData =  $request->validate([
            "title" => "required|max:250|string",
            "author" => "required|exists:authors,id",
            "total_inventory" => "required|integer|min:0"
        ]);
        $book->update([
            "title" => $validatedData["title"],
            "author_id" => $validatedData["author"]
        ]);
        $book->save();
        $newInv = $validatedData["total_inventory"];
        $lastInv = $book->bookInventory->total_inventory;
        $difInv = $newInv -  $lastInv;
        $newAvailable = $book->bookInventory->available_inventory + $difInv;
        $book->bookInventory->total_inventory = $newInv;
        $book->bookInventory->available_inventory = $newAvailable;
        $book->push();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
    /**
     * show details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book,Request $request)
    {
       $all =  $request->get("all");
        $loansQuery =   $book->loans();
        if($all != true){
            $loansQuery->where("delivered",false);
        }
        $loans = $loansQuery->get();
        return view("books.show", compact("loans","book"));
    }
}
