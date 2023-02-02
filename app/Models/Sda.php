<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sda extends Model
{
    use HasFactory;

    protected $table = 'Sdas';
    protected $fillable = ['number'];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_sda', 'client_id', 'sda_id')
            ->withPivot(['date_start', 'date_end'])
            ->withTimestamps();
    }
    public function Activites()
    {
        return $this->belongsToMany(Activite::class, 'activite_sda', 'activite_id', 'sda_id')
            ->withPivot([
                'nature',
                'operateur'
            ])
            ->withTimestamps();
    }
    public function freeSDA(Carbon $dateEnd = null)
    {
        if (!$dateEnd)
            $dateEnd = Carbon::now();
        //Free SDA from the last client if exists
        ClientSda::where([['sda_id', $this->id], ['date_end', null]])->update(['date_end' => $dateEnd]);
    }
}
