<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChienController extends Controller
{
    const NOM = "%chien%";
    public $categories = ["vivace", "5"];                   

    public function index(Request $request)
    {
        $cur_cat = $request->query("categorie");
        $chiens = DB::table("animals")->when($cur_cat, function ($query) use ($cur_cat) {
            $query->join("type_animals", "animals.type_animal", "=", "type_animals.id")->where(
                "type_animals.nom", "=", self::NOM
            )->where("categorie", "=", $cur_cat)->select("animals.*", "nom");
        },
            function ($query) {
                $query->join("type_animals", "animals.type_animal", "=", "type_animals.id")->where(
                    "type_animals.nom", "like", self::NOM
                )->select("animals.*", "nom");
            }
        )->get();
        $categories = $this->categories;
        return view("chiens", compact("chiens", "categories", "cur_cat"));
    }
}
