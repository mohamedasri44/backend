<?php

use App\Http\Controllers\ActiviteControleur;
use App\Http\Controllers\ActiviteSdaControleur;
use App\Models\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SdaControleur;
use App\Http\Controllers\ClientControleur;
use App\Http\Controllers\ClientSdaControleur;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*route::get('/clientsda',function (){
    $client = Client::find(1);

    $client->sdas()->attach([
       1=>[
            'date_start'=>'2000/05/12'
        ]
        ]);
        return $client;
});*/

Route::resource("/Client", ClientControleur::class);
Route::resource("/Sda", SdaControleur::class);
Route::resource("/ClientSda", ClientSdaControleur::class);
Route::resource("/Activites", ActiviteControleur::class);
Route::resource("/ActiviteSda", ActiviteSdaControleur::class);
Route::get('/', function () {
    return view('welcome');
});
