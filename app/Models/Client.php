<?php

namespace App\Models;

use App\Models\Sda;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    public function sdas()
    {
        return $this->belongsToMany(Sda::class, 'client_sda', 'client_id', 'sda_id')
            ->withPivot(['date_start', 'date_end'])
            ->withTimestamps();
    }
    public function Activites()
    {
        return $this->hasMany(Activite::class);
    }


    public function attachSDA(array $sdas, Carbon $startDate = null)
    {
        if (!$startDate) {
            $startDate = Carbon::now();
        }
        foreach ($sdas as $sda) {
            $s = sda::firstOrNew(['number' => $sda]);
            if (!$s->id) {
                $s->save();
            }

            $s->freeSDA($startDate);

            $this->sdas()->attach([
                $s->id => [
                    'date_start' => $startDate,
                    'date_end' => null
                ]
            ]);
        }
        return $sdas;
    }


    /*   public function Clientsda()
    {
        return $this->belongsToMany(sda::class)
                ->wherePivotIn('date_start',1)
                ->wherePivotNull('date_end');
    }*/
}
