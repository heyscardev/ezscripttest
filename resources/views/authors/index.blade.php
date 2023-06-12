@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-between my-2 align-items-center">
    <h1 class="text-black">Authors</h1>
    <a role="button" href="{{route('authors.create')}}" class="btn btn-outline-dark  ">New Author</a>
</div>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">Created Date</th>
                <th scope="col">Last Updated Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($authors as $author )
            <tr>
                <th scope="row">{{$author->id}}</th>
                <th>{{$author->name}}</th>
                <th>{{$author->lastname}}</th>
                <th>{{$author->created_at}}</th>
                <th>{{$author->updated_at}}</th>
                <th class="w-25"> <div class="d-flex "><a  href="{{route('authors.edit',$author->id)}}" class=" me-2 btn btn-secondary">Edit</a>
                    <form action="{{ route('authors.destroy',$author->id)}}" method="post">
                        <input class="btn btn-warning" type="submit"  value="Delete"/>
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
