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
         "email"=>"required",
         "kelas"=>"required",
         "tempat_lahir"=>"required",
         "tanggal_lahir"=>"required"
        ],

        [
            'nama.required'=>'Nama tidak boleh kosong',
            'NIS.required'=>'NIS tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'tempat_lahir.required'=>'Tempat Lahir tidak boleh kosong',
            'tanggal_lahir.required'=>'Tanggal Lahir boleh kosong',
        ]);

        $data=DataModel::create(
            [
            'nama'=>$request->nama,
            'NIS'=>$request->NIS,
            'email'=>$request->email,
            'kelas'=>$request->kelas,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            ]);
            return redirect('/createpost')->with('sukses', 'Tambah Data SUKSES!!!!');


        // dd($data);
     }

     public function getBiodata(){
         return view('pages.biodata', [
             'biodata' => DataModel::all()
         ]);
     }
     public function deleteData($id){
        DataModel::destroy($id);
        return redirect('/')->with('sukses', 'Hapus Data Berhasil');
     }

     public function ubahView(DataModel $id)
     {
        return view("pages.ubahBiodata", [
            "biodata"=>$id]);
        
     }

     public function ubahData(Request $request, DataModel $id)
     {
        $request->validate([
            "nama"=>"required|max:255",
            "NIS"=>"required",
            "email"=>"required",
            "kelas"=>"required",
            "tempat_lahir"=>"required",
            "tanggal_lahir"=>"required"
           ],
   
           [
               'nama.required'=>'Nama tidak boleh kosong',
               'NIS.required'=>'NIS tidak boleh kosong',
               'email.required'=>'Email tidak boleh kosong',
               'kelas.required'=>'Kelas tidak boleh kosong',
               'tempat_lahir.required'=>'Tempat Lahir tidak boleh kosong',
               'tanggal_lahir.required'=>'Tanggal Lahir boleh kosong',
           ]);

           $data=
            [
            'nama'=>$request->nama,
            'NIS'=>$request->NIS,
            'email'=>$request->email,
            'kelas'=>$request->kelas,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            ];
            DataModel::where('id', $id->id)->update($data);


            return redirect("/")->with("sukses", "edit data {$id->nama} sukses");

     }


}


