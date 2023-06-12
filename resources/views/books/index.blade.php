@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-between my-2 align-items-center">
    <h1 class="text-black">Books</h1>
    <a role="button" href="{{route('books.create')}}" class="btn btn-outline-dark  ">New Book</a>
</div>
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Avalilable Books</th>
            <th scope="col">Total Books</th>
            <th scope="col">Created Date</th>
                <th scope="col">Last Updated Date</th>
                <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($books as $book )
        <tr>
            <th scope="row">{{$book->id}}</th>
            <th>{{$book->title}}</th>
            <th>{{$book->author->name}} {{$book->author->lastname}}</th>
            <th>{{$book->bookInventory->available_inventory}}</th>
            <th>{{$book->bookInventory->total_inventory}}</th>
            <th>{{$book->created_at}}</th>
            <th>{{$book->updated_at}}</th>
            <th >
                <div class="d-flex "><a href="{{route('books.show',$book->id)}}" class=" me-2 btn btn-info">Loans</a>
                <div class="d-flex "><a href="{{route('books.edit',$book->id)}}" class=" me-2 btn btn-secondary">Edit</a>
                    <form action="{{ route('books.destroy',$book->id)}}" method="post">
                        <input class="btn btn-warning" type="submit" value="Delete" />
                        @method("DELETE")
                        @csrf
                    </form>

                </div>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
