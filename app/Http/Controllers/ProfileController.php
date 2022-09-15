<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use Auth;

class ProfileController extends Controller
{
    public function profile(){
        if(count(DataModel::all()->where('email', auth()->user()->email))=== 0){
            return redirect('/createpost')->with("Gagal", "Buat Biodata dengan Email yang Sama");
        }
        return view('pages.profile', [
            'biodata'=>DataModel::where('email', auth()->user()->email)->firstOrFail()
        ]);
    }
}
