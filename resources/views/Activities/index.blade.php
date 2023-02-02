@extends('layouts.app')

@section('title')
    Menu
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>List des Activities</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/Activites/create') }}" class="btn btn-success btn-sm" title="Add New Affictation">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br />
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>client_id</th>
                            <th>name</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activite as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->client->name }}</td>
                                <td>{{ $item->name }}</td>

                                <td>
                                    <a href="{{ url('/Activites/' . $item->id) }}" title="View Activites"><button
                                            class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                            View</button></a>
                                    <a href="{{ url('/Activites/' . $item->id . '/edit') }}" title="Edit Activites"><button
                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i> Edit</button></a>
                                    <form method="POST" action="{{ url('/Activites' . '/' . $item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Activites"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
