<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    //
    function index(){
        $formations = Formation::all();
        return view("formations",compact('formations'));
    }
}
