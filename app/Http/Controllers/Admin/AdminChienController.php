<?php

namespace App\Http\Controllers\Admin;

use App\Models\Animal;
use App\Models\TypeAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminChienController extends Controller
{
const CATEGORIES = ["vivace", "5"];
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {

        $chiens = Animal::query()->join("type_animals", "animals.type_animal", "=",
            "type_animals.id")->where("type_animals.nom", '=', 'chien')->select("animals.*","nom")->get();
        return view("admin.chiens.index", compact("chiens"));
    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
//
        $categories = self::CATEGORIES;
        return view("admin.chiens.create", compact("categories"));
    }

/**
 * Store a newly created resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {
// je valide la requete provenant du formulaire
// $request->validate([

// ]);

        $chien = new Animal();
        $idchien = TypeAnimal::query()->where("nom", "=", "chien")->pluck("id")->first();
        $chien->type_animal = $idchien;
        $chien->photo1 = $request->file("photo1")->store("chiens");
        $chien->photo2 = $request->file("photo2")->store("chiens");
        $chien->sexe = $request->sexe;
        $chien->poids = $request->poids;
        $chien->user_id = auth()->user()->id;
        $chien->quantite = $request->quantite;
        $chien->prix = $request->prix;
        $chien->categorie = $request->categorie;
        $chien->date_naissance = $request->date_naissance;
        $chien->race = $request->race;
        $chien->fake_prix = $request->fake_prix;

        $chien->save();

        return redirect()->route("admin.chiens.index")->with("messages.success", "chien ajoute avec success");
    }

/**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
//
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
//
        $categories = self::CATEGORIES;

        $chien = DB::table("animals")->join("type_animals", "animals.type_animal", "=",
            "type_animals.id")->where("type_animals.nom", "like", "%chien%")->where("animals.id", "=", $id)->select("animals.*",
            "type_animals.nom")->first(
        );

        return view("admin.chiens.edit", compact("chien", "categories"));
    }

/**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {
        $chien = Animal::findOrFail($id);

        if ($request->file("photo1")) {
            Storage::delete($chien->photo1);
            $chien->photo1 = $request->file("photo1")->store("chien");
        }
        if ($request->file("photo2")) {
            Storage::delete($chien->photo2);
            $chien->photo1 = $request->file("photo2")->store("chien");
        }

        $chien->sexe = $request->sexe;
        $chien->poids = $request->poids;
        $chien->user_id = auth()->user()->id;
        $chien->quantite = $request->quantite;
        $chien->prix = $request->prix;
        $chien->categorie = $request->categorie;
        $chien->date_naissance = $request->date_naissance;
        $chien->race = $request->race;
        $chien->fake_prix = $request->fake_prix;

        $chien->save();

        return redirect()->route("admin.chiens.index")->with("messages.success", "chien Editer avec success");
    }

/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
//
    }

}
