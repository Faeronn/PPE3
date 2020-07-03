<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Personnel extends Authenticatable
{
    use Notifiable;
    protected $table="PERSONNEL";
    protected $primaryKey="ID_PERSONNEL";
    public $timestamps = false;
    
    public function visites(){
        return $this->hasMany(Visite::class, "ID_PERSONNEL");
    }
    
    public function admins(){
        return $this->hasMany(Admin::class, "ID_PERSONNEL");
    }
    
    public function responsables_regions(){
        return $this->hasMany(Responsable_Region::class, "ID_PERSONNEL");
    }
    public function visiteurs(){
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
