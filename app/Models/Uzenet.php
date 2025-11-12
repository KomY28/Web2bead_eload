<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Uzenet extends Model
{
    use HasFactory;

    
    protected $table = 'uzenetek';

    
    protected $fillable = [
        'kuldo_id',
        'cimzett_id',
        'targy',
        'tartalom',
        'olvasva_ekkor',
    ];

    
    protected $casts = [
        'olvasva_ekkor' => 'datetime',
    ];

    public function kuldo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kuldo_id');
    }

   
    public function cimzett(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cimzett_id');
    }
}