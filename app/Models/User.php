<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // * Un user peut avoir un patient
    public function patient ()
    {
        return $this->hasOne(Patient::class);
    }

    // * Un user peut avoir un medecin
    public function medecin ()
    {
        return $this->hasOne(Medecin::class);
    }

    // * Un user peut avoir un administrateur
    public function Administrateur ()
    {
        return $this->hasOne(Administrateur::class);
    }

    // * Un User peut avoir plusieurs notifications
    public function Message()
    {
        return $this->hasMany(Message::class);
    }
}
