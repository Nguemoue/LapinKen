<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\TypeAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminCailleController extends Controller
{
    const CATEGORIES = ["vivace", "5"];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cailles = Animal::query()->join("type_animals", "animals.type_animal", "=",
            "type_animals.id")->where("type_animals.nom", 'like', '%caille%')->select("animals.*","nom")->get();
        return view("admin.cailles.index", compact("cailles"));
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
        return view("admin.cailles.create", compact("categories"));
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

        $caille = new Animal();
        $idcaille = TypeAnimal::query()->where("nom", "like", "%caille%")->pluck("id")->first();
        $caille->type_animal = $idcaille;
        $caille->photo1 = $request->file("photo1")->store("cailles");
        $caille->photo2 = $request->file("photo2")->store("cailles");
        $caille->sexe = $request->sexe;
        $caille->poids = $request->poids;
        $caille->user_id = auth()->user()->id;
        $caille->quantite = $request->quantite;
        $caille->prix = $request->prix;
        $caille->categorie = $request->categorie;
        $caille->date_naissance = $request->date_naissance;
        $caille->race = $request->race;
        $caille->fake_prix = $request->fake_prix;

        $caille->save();

        return redirect()->route("admin.cailles.index")->with("messages.success", "caille ajoute avec success");
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

        $caille = Animal::query()->join("type_animals", "animals.type_animal", "=",
            "type_animals.id")->where("type_animals.nom", "like", "%caille%")->where("animals.id", "=",
            $id)->select("animals.*",
            "type_animals.nom")->first();
        
        return view("admin.cailles.edit", compact("caille", "categories"));
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
        $caille = Animal::findOrFail($id);

        if ($request->file("photo1")) {
            Storage::delete($caille->photo1);
            $caille->photo1 = $request->file("photo1")->store("caille");
        }
        if ($request->file("photo2")) {
            Storage::delete($caille->photo2);
            $caille->photo1 = $request->file("photo2")->store("caille");
        }

        $caille->sexe = $request->sexe;
        $caille->poids = $request->poids;
        $caille->user_id = auth()->user()->id;
        $caille->quantite = $request->quantite;
        $caille->prix = $request->prix;
        $caille->categorie = $request->categorie;
        $caille->date_naissance = $request->date_naissance;
        $caille->race = $request->race;
        $caille->fake_prix = $request->fake_prix;

        $caille->save();

        return redirect()->route("admin.cailles.index")->with("messages.success", "caille Editer avec success");
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
