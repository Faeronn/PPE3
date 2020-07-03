<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table="PersoToVisiteur";
    protected $primaryKey="ID_PERSONNEL";
    public $timestamps = false;
    

    public function visites(){
        return $this->hasMany(Visite::class, "ID_PERSONNEL");
    }
    
    public function visiteur(){
        return $this->hasMany(Visiteur::class, "ID_PERSONNEL");
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NOM', 'PRENOM', 'email', 'FONCTION', 'DATE_NAISSANCE', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
