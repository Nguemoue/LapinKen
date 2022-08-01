<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\TypeAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminLapinController extends Controller
{
    const CATEGORIES = ["vivants", "nettoyes", "roties", "flambe"];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $lapins = DB::table("animals")->join("type_animals","animals.type_animal","=","type_animals.id")->where("type_animals.nom","like","%lapin%")->select("animals.*","type_animals.nom")->get(    );

        $lapins = Animal::query()->join("type_animals", "animals.type_animal", "=", "type_animals.id")->where("type_animals.nom", '=', 'lapin')->get();
        return view("admin.lapins.index", compact("lapins"));
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
        return view("admin.lapins.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // je valide la requete provenant du formulaire
        // $request->validate([

        // ]);

        $lapin = new Animal();
        $idlapin = TypeAnimal::query()->where("nom", "=", "lapin")->pluck("id")->first();
        $lapin->type_animal = $idlapin;
        $lapin->photo1 = $request->file("photo1")->store("lapins");
        $lapin->photo2 = $request->file("photo2")->store("lapins");
        $lapin->sexe = $request->sexe;
        $lapin->poids = $request->poids;
        $lapin->user_id = auth()->user()->id;
        $lapin->quantite = $request->quantite;
        $lapin->prix = $request->prix;
        $lapin->categorie = $request->categorie;
        $lapin->date_naissance = $request->date_naissance;
        $lapin->race = $request->race;
        $lapin->fake_prix = $request->fake_prix;

        $lapin->save();

        return redirect()->route("admin.lapins.index")->with("messages.success", "Lapin ajoute avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = self::CATEGORIES;

        $lapin = DB::table("animals")->join("type_animals", "animals.type_animal", "=", "type_animals.id")->where("type_animals.nom", "like", "%lapin%")->where("animals.id", "=", $id)->select("animals.*", "type_animals.nom")->first(
        );

        return view("admin.lapins.edit", compact("lapin", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lapin = Animal::findOrFail($id);

        if ($request->file("photo1")) {
            Storage::delete($lapin->photo1);
            $lapin->photo1 = $request->file("photo1")->store("lapin");
        }
        if ($request->file("photo2")) {
            Storage::delete($lapin->photo2);
            $lapin->photo1 = $request->file("photo2")->store("lapin");
        }

        $lapin->sexe = $request->sexe;
        $lapin->poids = $request->poids;
        $lapin->user_id = auth()->user()->id;
        $lapin->quantite = $request->quantite;
        $lapin->prix = $request->prix;
        $lapin->categorie = $request->categorie;
        $lapin->date_naissance = $request->date_naissance;
        $lapin->race = $request->race;
        $lapin->fake_prix = $request->fake_prix;

        $lapin->save();

        return redirect()->route("admin.lapins.index")->with("messages.success", "Lapin Editer avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
