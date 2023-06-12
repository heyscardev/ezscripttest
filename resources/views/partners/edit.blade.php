@extends('layouts.main')
@section("content")
<div class="container d-flex justify-content-center my-2">
    <h1 class="text-black">Edit Partner</h1>

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
        <form class="needs-validation w-100" action="{{route('partners.update',$partner->id)}}" method="post" novalidate>
            @csrf
            @method("PUT")
            <div class="row ">
                <div class="col-12 mb-3">
                    <label for="name-input">Name</label>
                    <input type="text" id="name-input" name="name" value="{{$partner->name}}" class="form-control" placeholder="Enter Name" required>

                </div>
                <div class="col-12 mb-3">
                    <label for="lastname-input">lastname</label>
                    <input type="text" id="lastname-input" value="{{$partner->lastname}}" name="lastname" class="form-control" placeholder="Enter Lastname" required>

                </div>
                <div class="col-12 mb-3">
                    <label for="phone-input">Phone</label>
                    <input type="phone" id="phone-input" name="phone" value="{{$partner->phone}}" class="form-control" placeholder="Enter phone" required>

                </div>
                <div class="col-md-7  col-12">
                    <label for="limit-input">Books Limit to Lead</label>
                    <input type="number" min="0" class="form-control" id="limit-input" value="{{$partner->inventory_limit}}" name="inventory_limit" placeholder="0 = dont have limit" required>

                </div>
                <div class="col-12 col-md-5 d-flex align-self-strech align-items-end justify-content-center ">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" value="1"   id="active-check" name="active" required {{$partner->active?"checked":""}}>
                        <label class="form-check-label" for="active-check" >active</label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" {{$partner->active?"":"checked"}} id="inactive-check" name="active" required>
                        <label class="form-check-label" for="inactive-check">inactive</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-dark mt-4" type="submit">Save</button>
            </div>
        </form>

    </div>

    @endsection
