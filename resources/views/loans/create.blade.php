@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-center my-2">
    <h1 class="text-black">New Loan</h1>

</div>
@if ($errors->any())
<div class="container d-flex justify-content-center ">
    <div class="alert alert-secondary m-0 p-0 pe-3 pt-3" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="row justify-content-center">
    <div class="col-9 col-md-6">
        <form class="needs-validation w-100" action="{{route('loans.store')}}" method="post" novalidate>
            @csrf
            <div class="col-12 mb-3">
                <label for="partner-select">Partner</label>
                <div class="row justify-content-between">
                    <div class="col-11"> <select class="form-select" placeholder="select partner" id="partner-select" name="partner">
                            @foreach ($partners as $partner)
                            <option  {{$partner->active?'':'disabled'}} value="{{$partner->id}}">
                                {{$partner->active?"":"(Disabled)"}}
                                id:{{ $partner->id }}
                                {{ $partner->name }}
                                {{ $partner->lastname }}
                                loans:{{$partner->loan_books}}
                                available:{{$partner->available_books}}
                                </options>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-11 mb-3">
                        <label for="book-select">Book</label>
                        <div class="row justify-content-between">
                            <div class="col-12"> <select class="form-select" placeholder="select book" id="book-select" name="book">
                                    @foreach ($books as $book)
                                    <option {{$book->there_are_availables?'':'disabled'}} value="{{$book->id}}">
                                        id:{{ $book->id }}
                                        {{ $book->title }}
                                        loans:{{$book->bookInventory->loan_books}}
                                        available:{{$book->bookInventory->available_inventory}}
                                        total:{{$book->bookInventory->total_inventory}}
                                        </options>
                                        @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <button class="btn btn-dark mt-4" type="submit">Save</button>
                            </div>
        </form>

    </div>

    @endsection
