<?php

namespace App\Http\Controllers;

use App\Models\Sda;
use App\Models\Client;
use App\Models\ClientSda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientSdaControleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $clientsda = ClientSda::all();

        return view('Affictatio.index')->with('clientsda', $clientsda);
        //  $Affictations = Sda::all();
        //  return view ('Affictation.index')->with('sdas', $Affictations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Clients = DB::table('clients')->get();
        return  view('Affictatio.create', ['Clients' => $Clients]);
        //   return view('Affictatio.create')->with('Clinet', $Clients);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cientid = $request->input('client_id');
        $datestart = $request->input('date_start');
        $sdas = $request->input('sda_id');

        $client = Client::find($Cientid);
        $sdas = array_filter(explode("\r\n", $sdas));

        dd($client->attachSDA($sdas, \Carbon\Carbon::parse($datestart)));



        // foreach ($sdas as $k => $sda) {
        //     $s = sda::firstOrNew(['number' => $sda]);
        //     $s->save();
        //     ClientSda::where([['sda_id', $s->id], ['date_end', null]])->update(['date_end' => $datestart]);
        //     /*  $s->clients()->wherePivot('date_end', null)
        //         ->updateExistingPivot(
        //             $s->Clients(),
        //             ['date_end' => $datestart]

        //         );*/

        //     $client->sdas()->attach([
        //         $s->id => [
        //             'date_start' => $datestart,
        //             'date_end' => null
        //         ]
        //     ]);
        // }
        dump("jj");
        // return redirect('ClientSda')->with('flash_message', 'clientsda Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClientSda::destroy($id);
        return redirect('ClientSda')->with('flash_message', 'clientsda deleted!');
    }
}
