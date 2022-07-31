<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{
//dashboard
    public function dashboard()
    {
        $owner = User::orderBy('name', 'ASC')->role('owner')->get();
        $manager = User::orderBy('name', 'ASC')->role('manager')->get();
        $data = Products::all();
        $pro = Products::orderBy('qty_k','DESC')->limit('10')->get();



        

        $this_year = Carbon::now()->format('Y');
        $month_p = Products::where('created_at','like', $this_year.'%')->get();

        for ($i=1; $i <= 12; $i++){
            $data_month_un_p[(int)$i]=0;
            $data_month_rug_p[(int)$i]=0;    
        }

        foreach ($month_p as $a) {
            $bulan_in_p= explode('-',carbon::parse($a->created_at)->format('Y-m-d'))[1];
            $untung = ($a->keluar - $a->masuk)*$a-->qty_k - $a->transport - ($a->qty_r*$a->masuk);
            if($untung >= 0){

                $data_month_un_p[(int) $bulan_in_p]+= $untung; 
                $data_month_rug_p[(int) $bulan_in_p]+= $a->masuk*$a->qty_r;
            }else{
                $data_month_un_p[(int) $bulan_in_p]+= 0; 
                $data_month_rug_p[(int) $bulan_in_p]+= $a->masuk*$a->qty_r + $untung*-1;
            }
        

       
        }

        $ip = $data->sum('masuk');
        $op = $data->sum('keluar');
        $u = $data->sum('keluar - masuk');

        // dd($data);
        return view('dashboard', compact('owner','manager','data','pro'),
    
    )
    -> with('data_month_un_p', $data_month_un_p)
    -> with('data_month_rug_p', $data_month_rug_p);
    }

//Auth Login
    public function __construct()
    {
        $this->middleware('auth');
    }

//Edit User
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
}