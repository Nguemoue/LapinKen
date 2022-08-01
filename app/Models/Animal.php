<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Animal extends Model
{
    use HasFactory;

    
    protected $casts = [
        "date_naissance" =>'date'
    ];

    function type_animal(){
        
        return $this->belongsTo(Animal::class);
    }
}
