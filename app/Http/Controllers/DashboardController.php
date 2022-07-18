<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $owner = User::orderBy('name', 'ASC')->role('owner')->get();
        $manager = User::orderBy('name', 'ASC')->role('manager')->get(); 
        
        return view('dashboard', compact('owner','manager'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditOwner(Request $request,$id){
        $data = User::where('id',$id)->orderBy('name', 'ASC')->role('owner')->firstOrFail();

        $request->validate([
            'gambar' => 'required|file|max:3072',
            'name' => 'required',
            
        ]);

        $data->name = $request->name;
       
        
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

    public function EditManager(Request $request,$id){
        $data = User::where('id',$id)->orderBy('name', 'ASC')->role('manager')->firstOrFail();

        $request->validate([
            'gambar' => 'required|file|max:3072',
            'name' => 'required',
            
        ]);

        $data->name = $request->name;
       
        
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



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
