<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class LapinController extends Controller
{
    //
    const NOM = "lapin";
    const CATEGORIES = ["vivants","nettoyes","roties","flambe"];
    function __construct()
    {
        
    }

    function index(Request $request){
        $categories = self::CATEGORIES;
        $current_categorie = $request->query("categorie");
        $lapins = DB::table("animals")->when($current_categorie,function($query) use($current_categorie){
            $query->join("type_animals","animals.type_animal","=","type_animals.id")->where(
            "type_animals.nom","=",self::NOM
            )->where("categorie","=",$current_categorie)->select("animals.*","nom");
        },
        function($query){
             $query->join("type_animals","animals.type_animal","=","type_animals.id")->where(
             "type_animals.nom","=",self::NOM
             )->select("animals.*","nom");
        }
        )->get();
        
        $current_categorie=$current_categorie??"all";
        return view("lapin",compact("lapins","categories","current_categorie"));
    }
}
