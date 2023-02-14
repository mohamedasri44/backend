<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Client;
use App\Models\ClientSda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientSdaRequest;
use App\Http\Resources\V1\ClientSdaResource;

class ClientSdaController extends Controller
{
    public function index()
    {
        return ClientSdaResource::collection(ClientSda::with('Client', 'Sda')->get());
    }


    public function show(ClientSda $clientSda)
    {
        //
    }
    public function store(StoreClientSdaRequest $request)
    {
        $Cientid = $request->input('client_id');
        $datestart = $request->input('date_start');
        $sdas = $request->input('sda_id');

        $client = Client::find($Cientid);
        $sdas = array_filter(explode("\n", $sdas));
        // $client->attachSDA($sdas, \Carbon\Carbon::parse($datestart));
        return response()->json($client->attachSDA($sdas, \Carbon\Carbon::parse($datestart)));
    }
    public function update(StoreClientSdaRequest $request, Client $client)
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
