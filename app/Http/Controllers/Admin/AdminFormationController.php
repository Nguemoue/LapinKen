<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;

class AdminFormationController extends Controller
{
    private $cibles = [
        'lapin','chiens','cailles',"cochon d'inde"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        return view("admin.formations.index",compact("formations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cibles = $this->cibles;
        return view("admin.formations.create",compact('cibles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'intitule'=>"required|string",
            "duree"=>"required",
            "prix"=>"required|integer",
            "modalite"=>"required",
            "description"=>"required",
            "photo"=>"required"
        ]);

        $formation = Formation::create(
            [
                "intitule"=>$request->input("intitule"),
                "duree"=>$request->input("duree"),
                "prix"=>$request->input("prix"),
                "modalite"=>$request->input("modalite"),
                "description"=>$request->description,
                "photo"=>$request->file("photo")->store("formation")
            ]
        );
        return view("admin.formations.index")->with("messages.success","formation cree avec success");
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
        //
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
