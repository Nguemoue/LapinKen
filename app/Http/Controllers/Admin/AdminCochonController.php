<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\TypeAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminCochonController extends Controller
{
    const CATEGORIES = ["vivace", "5"];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cochons = Animal::query()->join("type_animals", "animals.type_animal", "=",
            "type_animals.id")->where("type_animals.nom", 'like', '%cochon%')->select("animals.*", "nom")->get();
        return view("admin.cochons.index", compact("cochons"));
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
        return view("admin.cochons.create", compact("categories"));
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

        $cochon = new Animal();
        $idcochon = TypeAnimal::query()->where("nom", "like", "%cochon%")->pluck("id")->first();
        $cochon->type_animal = $idcochon;
        $cochon->photo1 = $request->file("photo1")->store("cochons");
        $cochon->photo2 = $request->file("photo2")->store("cochons");
        $cochon->sexe = $request->sexe;
        $cochon->poids = $request->poids;
        $cochon->user_id = auth()->user()->id;
        $cochon->quantite = $request->quantite;
        $cochon->prix = $request->prix;
        $cochon->categorie = $request->categorie;
        $cochon->date_naissance = $request->date_naissance;
        $cochon->race = $request->race;
        $cochon->fake_prix = $request->fake_prix;

        $cochon->save();

        return redirect()->route("admin.cochons.index")->with("messages.success", "cochon ajoute avec success");
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

        $cochon = DB::table("animals")->join("type_animals", "animals.type_animal", "=",
            "type_animals.id")->where("type_animals.nom", "like", "%cochon%")->where("animals.id", "=", $id)->select("animals.*",
            "type_animals.nom")->first(
        );

        return view("admin.cochons.edit", compact("cochon", "categories"));
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
        $cochon = Animal::findOrFail($id);

        if ($request->file("photo1")) {
            Storage::delete($cochon->photo1);
            $cochon->photo1 = $request->file("photo1")->store("cochon");
        }
        if ($request->file("photo2")) {
            Storage::delete($cochon->photo2);
            $cochon->photo1 = $request->file("photo2")->store("cochon");
        }

        $cochon->sexe = $request->sexe;
        $cochon->poids = $request->poids;
        $cochon->user_id = auth()->user()->id;
        $cochon->quantite = $request->quantite;
        $cochon->prix = $request->prix;
        $cochon->categorie = $request->categorie;
        $cochon->date_naissance = $request->date_naissance;
        $cochon->race = $request->race;
        $cochon->fake_prix = $request->fake_prix;

        $cochon->save();

        return redirect()->route("admin.cochons.index")->with("messages.success", "cochon Editer avec success");
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
