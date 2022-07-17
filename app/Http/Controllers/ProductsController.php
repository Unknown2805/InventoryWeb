<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function rekap(){
        $data = Products::all();
        
        
        return view('rekap',compact('data',));

        
    }

    public function in(){
        $in = Products::where('jenis','masuk')->get();

        return view('products.in',compact('in'));

    }

    public function storeIn(Request $request) {
        $this->validate($request,[
            'suppliers' => 'required',
            'barang' => 'required',
            'qty' => 'required',
            'in' => 'required',

        ]);

        $data = new Products();
        $data-> suppliers = $request-> suppliers;
        $data-> barang = $request-> barang;
        $data-> qty = $request-> qty;
        $data-> jenis = 'masuk';
       
            // dd($data);
        $data-> save();

        // Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->back();
        
    }

}
