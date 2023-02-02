@extends('layouts.app')

@section('title')
Menu
@endsection

@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2>List des Sdas</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/Sda/create') }}" class="btn btn-success btn-sm" title="Add New sda">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sdas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->number }}</td>

                                        <td>
                                            <a href="{{ url('/Sda/' . $item->id) }}" title="View Sda"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/Sda/' . $item->id . '/edit') }}" title="Edit Sda"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/Sda' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Sda" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
