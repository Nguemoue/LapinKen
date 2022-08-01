<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CochonController extends Controller
{
    //
    function index(){
        return view("cochons");
    }
}
