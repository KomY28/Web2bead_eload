<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Ezt add hozzá!

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // ... (a meglévő funkciók, pl. a 'role' már itt van)

    /**
     * ORM kapcsolat: A felhasználó által KÜLDÖTT üzenetek.
     * Egy felhasználónak TÖBB üzenete lehet.
     */
    public function kuldottUzenetek(): HasMany
    {
        return $this->hasMany(Uzenet::class, 'kuldo_id');
    }

    /**
     * ORM kapcsolat: A felhasználó által KAPOTT üzenetek.
     * Egy felhasználónak TÖBB üzenete lehet.
     */
    public function kapottUzenetek(): HasMany
    {
        return $this->hasMany(Uzenet::class, 'cimzett_id');
    }

} // <-- Ez a class utolsó zárójele

