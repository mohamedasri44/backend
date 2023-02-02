<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $table = 'activites';
    protected $fillable = ['name', 'prefixe', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function acsdas()
    {
        return $this->belongsToMany(Sda::class, 'activite_sda', 'activite_id', 'sda_id')
            ->withPivot([
                'nature',
                'operateur'
            ])
            ->withTimestamps();
    }
}
