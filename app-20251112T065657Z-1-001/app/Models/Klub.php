<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klub extends Model
{
    use HasFactory;

    
    protected $table = 'klubok';

    
    public $timestamps = false;

    
    protected $fillable = [
        'csapatnev',
    ];

   
    public function labdarugok(): HasMany
    {
        return $this->hasMany(Labdarugo::class, 'klubid');
    }
}