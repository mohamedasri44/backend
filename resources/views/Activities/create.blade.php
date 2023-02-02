@extends('layouts.app')
@section('title')
    New Activitie
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h1> nouvelle activité </h1>
        </div>
        <div class="card-body">

            <form action="{{ url('Activites') }}" method="post">
                {!! csrf_field() !!}
                <select name="client_id" id="client_id" class="form-control" required>
                    <option value="{{ old('client_id') }}"> </option>
                    @foreach ($Clients as $Client)
                        <option value="{{ $Client->id }}">{{ $Client->name }}</option>
                    @endforeach
                </select></br>
                <label> Name </label></br>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required></br>
                <label> prefixe </label></br>
                <input type="text" name="prefixe" id="prefixe" class="form-control" value="{{ old('prefixe') }}"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
