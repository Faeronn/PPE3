<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Film as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\User;

class Visiteur extends Authenticatable
{
    public $timestamps = false;
    protected $table ="VISITEUR";
    protected $primaryKey ="ID_PERSONNEL";
    
    public function visites(){
        return $this->belongsTo(Visite::class, "ID_PERSONNEL");
    }
    
    public function user(){
        return $this->belongsTo(User::class, "ID_PERSONNEL");
    }
    public function personnel(){
        return $this->belongsTo(Personnel::class, "ID_PERSONNEL");
    }
    
    protected $fillable = [
        'NOM', 'PRENOM', 'email', 'FONCTION', 'DATE_NAISSANCE', 'password', 'ID_VOITURE', 'OBJECTIF', 'PRIME', 'AVANTAGE', 'BUDGET',
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
