<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Poszt extends Model
{
    use HasFactory;

    /**
     * A modellhez tartozó adatbázis tábla.
     *
     * @var string
     */
    protected $table = 'posztok';

    /**
     * A modell nem használja a 'created_at' és 'updated_at' oszlopokat.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Definíció: Egy poszthoz több labdarúgó tartozik.
     */
    public function labdarugok(): HasMany
    {
        return $this->hasMany(Labdarugo::class, 'posztid');
    }
}