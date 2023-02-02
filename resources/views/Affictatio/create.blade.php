@extends('layouts.app')
@section('title')
    New Affictation
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h1> nouvelle Affictation </h1>
        </div>
        <div class="card-body">

            <form action="{{ url('ClientSda') }}" method="post">
                {!! csrf_field() !!}

                <label> name client </label></br>
                <select name="client_id" id="client_id" class="form-control" required>
                    <option value="{{ old('client_id') }}"> </option>
                    @foreach ($Clients as $Client)
                        <option value="{{ $Client->id }}">{{ $Client->name }}</option>
                    @endforeach
                </select></br>
                <label>sda_id</label></br>
                <textarea name="sda_id" id="sda_id" class="form-control" cols="30" rows="10" value="{{ old('sda_id') }}"
                    required></textarea>
                <label>date_start</label></br>
                <input type="datetime-local" name="date_start" id="date_start" class="form-control"
                    value="{{ old('date_start') }}" required></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>
@stop
