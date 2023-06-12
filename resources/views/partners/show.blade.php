@extends('layouts.main')
@section("content")


<div class="container d-flex justify-content-between my-2 align-items-center">
    <h1 class="text-black">Partner Loans</h1>
    <a role="button" href="{{route('partners.show',request()->get('all') != true?['id'=>$partner->id,'all'=>true]:['id'=>$partner->id])}}" class="btn btn-outline-dark  {{request()->get('all')?'active':''}}">All Loans</a>
</div>
<div class="container d-flex justify-content-between my-2 align-items-center">
    <h5 class="text-secondary text-uppercase">Partner: {{$partner->name}} {{$partner->lastname}}</h5>
    <h5 class="text-secondary ">Phone: {{$partner->phone}}</h5>
    <h5 class="text-warning ">limit: {{$partner->inventory_limit == 0 ? "no limited":$partner->inventory_limit  }}</h5>
    @if ($partner->active)
    <span class="badge bg-primary">active</span>
    @else
    <span class="badge bg-danger">inactive</span>
    @endif
</div>
@include('components.loans')
@endsection
