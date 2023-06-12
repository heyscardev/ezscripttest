<form class="needs-validation w-100" action="{{route('loans.update',$loan->id)}}" method="post" novalidate>
    @csrf
    @method('PUT')
    <input hidden class="form-check-input" type="checkbox" value="{{!$loan->delivered?'1':'0'}}" name="delivered" checked>
    <div class="form-check form-switch">
        <input  onchange="this.form.submit()" class="form-check-input" type="checkbox" role="switch" value="" {{$loan->delivered?'checked':''}} >
    </div>

</form>
