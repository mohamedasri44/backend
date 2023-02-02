@extends('layouts.app')

@section('title')
Menu
@endsection

@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2>List des Affictation</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/ClientSda/create') }}" class="btn btn-success btn-sm" title="Add New Affictation">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>client_id</th>
                                        <th>sda_id</th>
                                        <th>date_start</th>
                                        <th>date_end</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clientsda as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->client->name}}</td>
                                        <td>{{ $item->sda->number }}</td>
                                        <td>{{ $item->date_start }}</td>
                                        <td>{{ $item->date_end }}</td>
                                        <td>
                                            <a href="{{ url('/ClientSda/' . $item->id) }}" title="View ClientSda"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/ClientSda/' . $item->id . '/edit') }}" title="Edit ClientSda"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/ClientSda' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete ClientSda" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
