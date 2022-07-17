<?php

namespace App\Http\Controllers;
use App\Models\ProductsIn;

use Illuminate\Http\Request;

class ProductsInController extends Controller
{
    public function in(){
        $in = ProductsIn::where('jenis','masuk')->get();

        return view('products.in',compact('in'));

    }

    public function storeIn(Request $request) {
        $this->validate($request,[
            'suppliers' => 'required',
            'barang' => 'required',
            'qty' => 'required',
            'in' => 'required',

        ]);

        $data = new ProductsIn();
        $data-> suppliers = $request-> suppliers;
        $data-> barang = $request-> barang;
        $data-> qty = $request-> qty;
        $data-> in = $request-> in;
        $data-> jenis = 'masuk';
       
            // dd($data);
        $data-> save();

        // Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->back();
        
    }

    public function editIn(Request $request,$id) {
        $data = ProductsIn::where('id',$id)->firstOrFail();

        $request->validate([
            'suppliers' => 'required',
            'barang' => 'required',
            'qty' => 'required',
            'in' => 'required',
        ]);
        // dd($request);

        $data-> suppliers = $request-> suppliers;
        $data-> barang = $request-> barang;
        $data-> qty = $request-> qty;
        $data-> in = $request-> in;
        $data-> jenis = 'masuk';
       
        $data->update();


        return redirect()->back();
    }
}
