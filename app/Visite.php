<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Visite as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Personnel;

class Visite extends Model
{
    public $timestamps = false;
    protected $table ="VISITE";
    protected $primaryKey ="ID_VISITE";
    
    public function visiteur(){
        return $this->belongsTo(Visiteur::class, "ID_PERSONNEL");
    }
    
    public function user(){
        return $this->belongsTo(User::class, "ID_PERSONNEL");
    }
    
    public function personnel(){
        return $this->belongsTo(Personnel::class, "ID_PERSONNEL");
    }
   
    
    protected $fillable = [
        'ID_PRACTICIEN', 'ID_PERSONNEL', 'LIEU', 'DATE_V', 'DESCRIPTION', 'H_DEBUT', 'H_FIN',
    ];



   
}
