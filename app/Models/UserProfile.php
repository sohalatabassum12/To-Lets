<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserProfile extends Model
{
    use HasFactory, Notifiable;


    

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
