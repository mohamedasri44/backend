<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSda extends Model
{
    use HasFactory;


   protected $fillable = [
        'client_id',
        'sda_id',
        'date_start',
        'date_end'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function sda()
    {
        return $this->belongsTo(Sda::class);
    }
}
