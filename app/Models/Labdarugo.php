<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Labdarugo extends Model
{
    use HasFactory;

    /**
     * A modellhez tartozó adatbázis tábla.
     *
     * @var string
     */
    protected $table = 'labdarugok';

    /**
     * A modell nem használja a 'created_at' és 'updated_at' oszlopokat.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Az attribútumok, amiket automatikusan típusra kell konvertálni.
     *
     * @var array
     */
    protected $casts = [
        'szulido' => 'date',
        'magyar' => 'boolean',
        'kulfoldi' => 'boolean',
    ];

    
    public function klub(): BelongsTo
    {
        return $this->belongsTo(Klub::class, 'klubid');
    }

    
    public function poszt(): BelongsTo
    {
        return $this->belongsTo(Poszt::class, 'posztid');
    }
}