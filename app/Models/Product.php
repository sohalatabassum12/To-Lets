<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory,Notifiable;

    const available = 0; 
    const pending = 1;
    const booked = 2;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
