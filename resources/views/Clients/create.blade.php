@extends('layouts.app')
@section('title')
New Client
@endsection
@section('content')
<div class="card">
<div class="card-header"><h1>nouveau Client </h1></div>
<div class="card-body">

    <form action="{{ url('Client') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"   value="{{ old('name') }}"  required></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

</div>
</div>
@stop
