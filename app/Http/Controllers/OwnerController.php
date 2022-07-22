<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $id_user = user::all();
        $user = User::orderBy('name', 'ASC')->role('owner')->get();
        return view('owner')
            ->with('user', $user);
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

        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        // dd($data);
        $data->save();
        $data->assignRole('owner');

        // Alert::success('Sukses!', 'Berhasil Menambah Data');
        return redirect()->back()->with('success', 'Task Created Successfully!');
    }


    public function login(Request $request)
    {
        $data = User::all();
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
        return redirect('/owner');
    }
}
