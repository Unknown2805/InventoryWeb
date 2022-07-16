<?php

namespace App\Http\Controllers;
use App\Models\Profile;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $data = Profile::all();
        return view('dashboard',compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|max:3072',
            'nama' => 'required',
     
        ]);

        $data = new Profile();
        $data->nama = $request->nama;

        $img = $request->file('gambar');
        $filename = $img->getClientOriginalName();
        
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->storeAs('/profile',$filename);
        }

        $data->gambar = $request->file('gambar')->getClientOriginalName();
        // dd($data);

        $data->save();

        return redirect()->back();
    }

    public function editProfile(Request $request,$id){
        $data = Profile::where('id',$id)->firstOrFail();

        $request->validate([
            'gambar' => 'required|file|max:3072',
            'nama' => 'required',
            
        ]);

        $data->nama = $request->nama;
       
        
        $img = $request->file('gambar');
        $filename = $img->getClientOriginalName();

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->storeAs('/profile',$filename);
        }
        $data->gambar = $request->file('gambar')->getClientOriginalName();
        // dd($data);
        $data->update();

        return redirect()->back();
    }
}
