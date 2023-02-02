@extends('layouts.app')
@section('title')
New Sda
@endsection
@section('content')
<div class="card">
<div class="card-header"><h1> nouvelle  Sda </h1></div>
<div class="card-body">

    <form action="{{ url('Sda') }}" method="post">
        {!! csrf_field() !!}
        <label>number</label></br>
        <input type="text" name="number" id="number" class="form-control"   value="{{ old('number') }}"  required></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

</div>
</div>
@stop
