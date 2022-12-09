<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view("admin.home");
    }
    public function updateProfile(Request $request)
    {
        
        if ($request->file("profil")) {
            $name = $request->file("profil")->store("avatar");
            Storage::delete(auth()->user()->photo);
            auth()->user()->photo = $name;
            $userid = auth()->user()->id;
            User::query()->where("id","=",$userid)->update([
                'photo'=>$name
            ]);
            return redirect()->route("admin")->with("messages.succes", "photo de profil modifier avec success");
        }
        return redirect()->back();

    }
}
