<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KapcsolatiUzenet extends Model
{
    use HasFactory;

    
    protected $table = 'kapcsolati_uzenetek';

    
    protected $fillable = [
        'nev',
        'email',
        'targy',
        'uzenet',
    ];
}