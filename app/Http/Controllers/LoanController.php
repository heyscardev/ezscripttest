<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\LoanCreateRequest;
use App\Loan;
use App\Partner;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $all = $request->get('all');
        $loansQuery = Loan::query();
        if ($all != true) {
            $loansQuery->where('delivered', false);
        }
        $loans = $loansQuery->get();
        return view('loans.index', compact('loans'));
    }

    public function update(Request $request, Loan $loan)
    {
        $valid = $request->validate(['delivered' => 'required|boolean']);

        $title =  $loan->book->title;


        if (!$valid['delivered'] && $loan->delivered && !$loan->book->there_are_availables) {
            $title =  $loan->book->title;
            $partner =  $loan->partner->name;
            if (!$loan->partner->active) return back()->withErrors(["partner $partner is disabled!"]);
            return back()->withErrors(["the book $title haven\'t copies availables"]);
        };
        $loan->update($valid);
        $bookInventory = $loan->book->bookInventory;
        $bookInventory->available_inventory = $valid['delivered'] ? $bookInventory->available_inventory + 1 : $bookInventory->available_inventory - 1;
        $bookInventory->save();
        return back();
    }
    public function store(LoanCreateRequest $request)
    {
        $valid = $request->validated();
        $book_id = $valid["book"];
        $partner_id = $valid["partner"];
        $delivered = isset($valid["delivered"]) || false;
        $loan = new Loan(compact("book_id", "partner_id", "delivered"));
        $loan->save();
        if (!$delivered) {
            $bookInventory = $loan->book->bookInventory;
            $bookInventory->available_inventory = $bookInventory->available_inventory - 1;
            $bookInventory->save();
        }
        return redirect()->route("loans.index");
    }
    public function create()
    {
        $partners = Partner::canDoLoan()->get();
        $books = Book::availables()->get();
        return view('loans.create', compact('books', 'partners'));
    }
}
