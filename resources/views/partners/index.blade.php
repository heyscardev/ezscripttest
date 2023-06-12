@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-between my-2 align-items-center">
    <h1 class="text-black">Partners</h1>
    <a role="button" href="{{route('partners.create')}}" class="btn btn-outline-dark  ">New Partner</a>
</div>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">Phone</th>
                <th scope="col">Active</th>
                <th scope="col">Books Limit to lend </th>
                <th scope="col">Loan Books</th>
                <th scope="col">Created Date</th>
                <th scope="col">Last Updated Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($partners as $partner )
            <tr>
                <th scope="row">{{$partner->id}}</th>
                <th>{{$partner->name}}</th>
                <th>{{$partner->lastname}} </th>
                <th>{{$partner->phone}}</th>
                <th>@include('components.partner-state')</th>
                <th>{{$partner->inventory_limit}}</th>
                <th>{{$partner->loan_books}}</th>
                <th>{{$partner->created_at}}</th>
                <th>{{$partner->updated_at}}</th>
                <th>
                    <div class="d-flex ">
                    <div class="d-flex "><a href="{{route('partners.show',$partner->id)}}" class=" me-2 btn btn-info">Loans</a>
                        <a href="{{route('partners.edit',$partner->id)}}" class=" me-2 btn btn-secondary">Edit</a>
                        <form action="{{ route('partners.destroy',$partner->id)}}" method="post">
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
