<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $id_user = user::all();
        $user = User::orderBy('name', 'ASC')->role('manager')->get();
        return view('manager')
            ->with('user', $user);

        // ->with('id_manager', $id_manager);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "email" => 'required',
            "password" => 'required|min:8',
            "gambar" => 'required|file|max:3072',


        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        $img = $request->file('gambar');
        $filename = $img->getClientOriginalName();
        
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->storeAs('/User',$filename);
        }

        $data->gambar = $request->file('gambar')->getClientOriginalName();

        // dd($data);
        $data->save();
        $data->assignRole('manager');

        // Alert::success('Sukses!', 'Berhasil Menambah Data');
        return redirect()->back()->with('success', 'Task Created Successfully!');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        
        // Alert::success('Sukses!','Berhasil Menghapus Data');
        return redirect('/manager');
    }
}
