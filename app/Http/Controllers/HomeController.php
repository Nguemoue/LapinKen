<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Animal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(){

        $totalCount = new stdClass;
    
        $nb_lapins = Animal::query()->join("type_animals", "animals.type_animal", "=",
        "type_animals.id")->where("type_animals.nom", 'like', '%lapin%')->count();

        $nb_chiens = Animal::query()->join("type_animals", "animals.type_animal", "=",
        "type_animals.id")->where("type_animals.nom", 'like', '%chien%')->count();
        
        $nb_cochons = Animal::query()->join("type_animals", "animals.type_animal", "=",
        "type_animals.id")->where("type_animals.nom", 'like', '%cochon%')->count();
        $nb_cailles = Animal::query()->join("type_animals", "animals.type_animal", "=",
        "type_animals.id")->where("type_animals.nom", 'like', '%caille%')->count();
        $totalCount->lapin = $nb_lapins;
        $totalCount->chien = $nb_chiens;
        $totalCount->caille = $nb_cailles;
        $totalCount->cochon = $nb_cochons;


        return view("index",compact("totalCount"));
    }
}
