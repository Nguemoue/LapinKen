<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAnimal extends Model
{
    use HasFactory;

    protected $guarded = [];

    function getFackePrixAttribute(){
        return $this->prix * random_int(1,2)/2;
    }

    public function animals(){
        return $this->hasMany(Animal::class);
    }
}
