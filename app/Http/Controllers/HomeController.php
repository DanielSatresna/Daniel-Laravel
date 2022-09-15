<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.biodata',
        ['biodata'=>DataModel::all()]);
    }

    public function search(Request $request){
        $searchResult = $request->search;
        $result=DataModel::where('nama', 'like', "%".$searchResult."%")->paginate();
        return view('pages.biodata', ['biodata' => $result]);
    }
}
