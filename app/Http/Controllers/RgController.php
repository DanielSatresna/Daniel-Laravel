<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RgController extends Controller
{

    public function index(){
        return view('register.regTampil', 
    ['register'=>User::All()]);
    }

    public function addData(Request $request){
        $request->validate([
            "name"=>"required|max:255",
            "email"=>"required",
            "password"=>"required"
           ],
   
           [
               'name.required'=>'Nama tidak boleh kosong',
               'email.required'=>'Email tidak boleh kosong',
               'password.required'=>'Password tidak boleh kosong',
           ]);
   
           $data=User::create(
               [
               'name'=>$request->name,
               'email'=>$request->email,
               'password'=>Hash::make($request->password),
               ]);
               return redirect('/regAll')->with('sukses', 'Register SUKSES!!!!');
    }

    public function ShowOneData(User $id){
        return view('register.regEdit', [
            'register' => $id
        ]);
    }

    public function UpdateData(Request $request, User $id){
        $validatedData=$request->validate([
            "name"=>"required|max:255",
            "email"=>"required",
            "password"=>"required"
           ],
   
           [
               'name.required'=>'Nama tidak boleh kosong',
               'email.required'=>'Email tidak boleh kosong',
               'password.required'=>'Password tidak boleh kosong',
           ]);
   
           if($validatedData){
            User::where('id', $id->id)->update($validatedData);
            return redirect("/regAll ")->with("sukses", "edit data {$id->nama} sukses");
           }   
    }

    public function deleteData($id){
        User::destroy($id);
        return redirect('regAll')->with('sukses', 'Hapus Data Berhasil');
    }

    public function search(Request $request){
        $searchResult = $request->search;
        $result=User::where('name', 'like', "%".$searchResult."%")->paginate();
        return view('register.regTampil', ['register' => $result]);
    }
}