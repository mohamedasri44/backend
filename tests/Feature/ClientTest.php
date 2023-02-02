<?php

namespace Tests\Feature;

use App\Models\Sda;
use Tests\TestCase;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    public $clientname = 'mohamed';
    public $sdanumbre = '10382000';
    public  function test_create_client()
    {
        $Client = Client::factory()->create(
            ['name' => 'mohamed']

        );
        $this->assertDatabaseHas('clients', [
            'name' => 'mohamed',
        ]);
    }
    public  function test_create_sda()
    {
        /* $Sda = Sda::factory()->create(
            ['number' => '10382000']
        );*/
        $this->assertDatabaseHas('sdas', [
            'number' => '10382000',
        ]);
    }
    public  function test_attachSDA()
    {
        $clientname = 'mohamed';
        $sdanumbre = '10382000';
        $Clientid = 1;
        $sdaid = 1;
        $startDate = '2022/05/05';



        $client = Client::find($Clientid);

        $client->sdas()->attach([
            $sdaid => [
                'date_start' => $startDate,
                'date_end' => null
            ]
        ]);
        $this->assertDatabaseHas('client_sda', [
            'client_id' => $Clientid,
            'sda_id' => $sdaid,
            'date_start' => $startDate,

        ]);
    }

    public  function test_attacheSda_not_exist()
    {
        $Client = Client::factory()->create(
            ['name' => 'mohamed']

        );
        $this->assertDatabaseHas('clients', [
            'name' => 'mohamed',
        ]);
    }
}
