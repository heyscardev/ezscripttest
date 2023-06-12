@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-center my-2">
    <h1 class="text-black">New Book</h1>

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
        <form class="needs-validation w-100" action="{{route('books.store')}}" method="post" novalidate>
            @csrf
            <div class="row ">
                <div class="col-12 mb-3">
                    <label for="title-input">Title</label>
                    <input type="text" id="title-input" name="title" class="form-control" placeholder="Title" placeholder="enter title" required>

                </div>
                <div class="col-12 mb-3">
                    <label for="author-select">Author</label>
                    <div class="row justify-content-between">
                        <div class="col-9"> <select class="form-control" placeholder="select author" id="author-select" name="author">
                                @foreach ($authors as $author)
                                <option value="{{$author->id}}">{{ $author->name }} {{ $author->lastname }}</options>
                                    @endforeach
                            </select></div>
                        <div class="col-3"><a href="{{route('authors.create')}}" class="btn btn-dark">New Author</a></div>
                    </div>
                </div>

            </div>

            <div class="col-12 ">
                <label for="inventory-input">Inventory</label>
                <input type="number" min="0" class="form-control" id="inventory-input" name="total_inventory" placeholder="total books in inventory" required>

            </div>



            <div class="row">
                <button class="btn btn-dark mt-4" type="submit">Save</button>
            </div>
        </form>

    </div>

    @endsection
