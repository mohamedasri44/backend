<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\V1\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return ClientResource::collection(Client::all());
    }
    public function show(Client $client)
    {
        return new ClientResource($client);
    }
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return response()->json("Client added");
    }
    public function update(StoreClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return response()->json("Client updated");
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json("Client Deleted");
    }
}
