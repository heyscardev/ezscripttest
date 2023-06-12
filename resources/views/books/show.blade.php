@extends('layouts.main')
@section("content")

<div class="container d-flex justify-content-between my-2 align-items-center">
    <h1 class="text-black">Loan Books</h1>
    <a role="button"  href="{{route('books.show',request()->get('all') != true?['id'=>$book->id,'all'=>true]:['id'=>$book->id])}}" class="btn btn-outline-dark  {{request()->get('all')?'active':''}}">All Loans</a>
</div>
<div class="container d-flex justify-content-between my-2 align-items-center">
    <h5 class="text-secondary text-uppercase">Title: {{$book->title}}</h5>
    <h5 class="text-secondary ">author: {{$book->author->name}} {{$book->author->lastname}}</h5>
    <h5 class="text-warning ">available books: {{$book->bookInventory->available_inventory  }}</h5>
    <h5 class="text-warning ">total books: {{$book->bookInventory->total_inventory  }}</h5>
    @if ($book->bookInventory->available_inventory)
    <span class="badge bg-primary">available</span>
    @else
    <span class="badge bg-danger">not available</span>
    @endif
</div>
@include('components.loans')


@endsection
