<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use Illuminate\Support\Facades\Session;


class DataControl extends Controller
{
    public function saveBiodata(Request $request){
        $request->validate([
         "nama"=>"required|max:255",
         "NIS"=>"required",
         "kelas"=>"required",
         "tempat_lahir"=>"required",
         "tanggal_lahir"=>"required"
        ],

        [
            'nama.required'=>'Nama tidak boleh kosong',
            'NIS.required'=>'NIS tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'tempat_lahir.required'=>'Tempat Lahir tidak boleh kosong',
            'tanggal_lahir.required'=>'Tanggal Lahir boleh kosong',
        ]);

        $data=DataModel::create(
            [
            'nama'=>$request->nama,
            'NIS'=>$request->NIS,
            'kelas'=>$request->kelas,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            ]);

            if($data){
                Session::flash('sukses','Tambah data SUKSES!!!');
                return redirect('/createpost');
            }


        // dd($data);
     }

     public function getBiodata(){
         return view('pages.biodata', [
             'biodata' => DataModel::all()
         ]);
     }
}
