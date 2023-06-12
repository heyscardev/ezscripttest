@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-center my-2">
    <h1 class="text-black">New Author</h1>

</div>

@if ($errors->any())
<div class="container d-flex justify-content-center ">
    <div  class="alert alert-secondary m-0 p-0 pe-3 pt-3" role="alert">
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
        <form class="needs-validation" action="{{ route('authors.store') }}" w-100" role="form" method="POST">
            @csrf
            <div class="row ">
                <div class="col-12 mb-3">
                    <label for="name-input">Name</label>
                    <input type="text" id="name-input" name="name" class="form-control" placeholder="enter name" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="lastname-input">Lastname</label>
                    <input type="text" id="lastname-input" name="lastname" class="form-control" placeholder="enter lastname" required>

                </div>
            </div>
            <div class="row">
                <button class="btn btn-dark mt-4" type="submit">Save</button>
            </div>
        </form>

    </div>

    @endsection
