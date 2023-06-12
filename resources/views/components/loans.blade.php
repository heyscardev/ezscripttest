

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">partner</th>
                <th scope="col">book</th>
                <th scope="col">author</th>
                <th scope="col">delivered</th>
                <th scope="col">Created Date</th>
                <th scope="col">Last Updated Date</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach ($loans as $loan )
            <tr>
                <th scope="row">{{$loan->id}}</th>
                <th scope="row">{{$loan->partner->name}} {{$loan->partner->lastname}}</th>
                <th scope="row">{{$loan->book->title}} </th>
                <th scope="row">{{$loan->book->author->name}} {{$loan->book->author->lastname}}</th>
                <th>@include('components.loans-switch')</th>
                <th>{{$loan->created_at}}</th>
                <th>{{$loan->updated_at}} </th>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
