<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Film as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\User;

class Responsable_Region extends Authenticatable
{
    public $timestamps = false;
    protected $table ="RESPONSABLEREGION";
    protected $primaryKey ="ID_RESPONSABLEREGION";
    
     
    public function personnel(){
        return $this->belongsTo(Personnel::class, "ID_PERSONNEL");
    }
    
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
