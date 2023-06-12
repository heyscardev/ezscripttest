<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

        /**
           * Display a listing of the resource.
           *
           * @return \Illuminate\Http\Response
           */
          public function index()
          {
              $partners = Partner::all();
              return view("partners.index",compact("partners"));
          }

          /**
           * Show the form for creating a new resource.
           *
           * @return \Illuminate\Http\Response
           */
          public function create()
          {
              return view("partners.create");

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
              "name"=>"required|max:250|alpha",
              "lastname"=>"required|max:250|alpha",
              "phone"=>"required|numeric|min:0",
              "inventory_limit"=>"required|integer|min:0",
              "active"=>"required|boolean"
           ]);
           $partner  = new Partner($validatedData);
           $partner->save();
           return redirect()->route('partners.index');
          }


          /**
           * Show the form for editing the specified resource.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function edit(Partner $partner)
          {

           return view("partners.edit",compact("partner"));
          }

          /**
           * Update the specified resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function update(Request $request,Partner $partner)
          {
            $validatedData =  $request->validate([
                "name"=>"required|max:250|alpha",
                "lastname"=>"required|max:250|alpha",
                "phone"=>"required|numeric|min:0",
                "inventory_limit"=>"required|integer|min:0",
                "active"=>"required|boolean"
             ]);
             if( $validatedData["inventory_limit"] != 0 && $partner->loan_books > $validatedData["inventory_limit"]) return back()->withErrors(["limit must be greater or equal than loan books"]);
             $partner->update($validatedData);
             return redirect()->route('partners.index');
          }

          /**
           * Remove the specified resource from storage.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function destroy(Partner $partner)
          {
             $partner->delete();
             return redirect()->route('partners.index');
          }
 /**
     * show details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner,Request $request)
    {
       $all =  $request->get("all");
        $loansQuery =   $partner->loans();
        if($all != true){
            $loansQuery->where("delivered",false);
        }
        $loans = $loansQuery->get();
        return view("partners.show", compact("loans","partner"));
    }

}
