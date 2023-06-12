@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-between my-2 align-items-center">
    <h1 class="text-black">Loans</h1>
   <div>
   <a role="button"  href="{{route('loans.index',request()->get('all') != true?['all'=>true]:[])}}" class="btn btn-outline-dark  {{request()->get('all')?'active':''}}">All Loans</a>
   <a role="button"  href="{{route('loans.create')}}" class="btn btn-outline-warning">New Loan</a>
   </div>
</div>
@include("components.loans")

@endsection
