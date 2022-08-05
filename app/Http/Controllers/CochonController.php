<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CochonController extends Controller
{
    //
    const NOM = "%cochon%";
    public $categories = ["vivace", "5"];

    function index(Request $request){
        $cur_cat = $request->query("categorie");
        $cochons = DB::table("animals")->when($cur_cat,function($query) use($cur_cat){
            $query->join("type_animals","animals.type_animal","=","type_animals.id")->where(
                "type_animals.nom","=",self::NOM
                )->where("categorie","=",$cur_cat)->select("animals.*","nom");
            },
            function($query){
                $query->join("type_animals","animals.type_animal","=","type_animals.id")->where(
                "type_animals.nom","like",self::NOM
                )->select("animals.*","nom");
            }
        )->get();
        $categories = $this->categories;
        return view("cochons", compact("cochons","categories","cur_cat"));
    }
}
