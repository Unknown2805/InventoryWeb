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

    public function out(){
        $sold= Products::all();

        return view('products.out',compact('sold'));

    }
    public function sale(){
        $sale = Products::all();

        // if(!isset($sale)){
        //     $sale->qty = 0;
        // }
        // if(!isset(out)){
        //     $out->qty = 0;
        // }
                
        $qty_m = $sale->sum('qty_m');
        $qty_k = $sale->sum('qty_k');

        $sale_qty = $qty_m - $qty_k;
        return view('products.sale',compact('sale','qty_m','qty_k','sale_qty'));

    }
    public function crash(){
        $crash = Products::where('rusak','rusak')->get();

        return view('products.crash',compact('crash'));

    }

    public function storeIn(Request $request) {
        $this->validate($request,[
            'suppliers' => 'required',
            'barang' => 'required',
            'masuk' => 'required',
            'qty_m' => 'required',
            

        ]);

        $in = new Products();
        $in-> suppliers = $request-> suppliers;
        $in-> barang = $request-> barang;
        $in-> masuk = $request-> masuk;
        $in-> qty_m = $request-> qty_m;        
        $in-> jenis = 'masuk';
        $in-> status = 'normal';
       
            // dd($in);
        $in-> save();

        // Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->back();
        
    }

    public function editIn(Request $request,$id) {
        $in = Products::where('id',$id)->firstOrFail();

        $request->validate([
            'suppliers' => 'required',
            'barang' => 'required',
            'masuk' => 'required',
            'qty_m' => 'required',
        ]);
        // dd($request);
        
        $in->suppliers = $request->suppliers;
        $in->barang = $request->barang;
        $in->masuk = $request->masuk;
        $in->qty_m = $request->qty_m;

        // dd($data);
        $in->update();

        return redirect()->back();
    }
    public function editOut(Request $request,$id) {
        $out = Products::where('id',$id)->firstOrFail();

        $request->validate([
            
            'barang' => 'required',
            'keluar' => 'required',
            'qty_k' => 'required',
        ]);
        // dd($request);
        
       
        $out->barang = $request->barang;
        $out->keluar = $request->keluar;
        $out->qty_m = $out->qty_m - $request->qty_k;
        $out->qty_k = $out->qty_k + $request->qty_k;

        // dd($data);
        $out->update();

        return redirect()->back();
    }

    public function storeOut(Request $request) {
        $this->validate($request,[
            'suppliers' => 'required',
            'barang' => 'required',
            'keluar' => 'required',
            'qty_k' => 'required',
            

        ]);

        $data = new Products();
        $data-> suppliers = $request-> suppliers;
        $data-> barang = $request-> barang;
        $data-> keluar = $request-> keluar;
        $data-> qty_k = $request-> qty_k;
        $data-> jenis = 'keluar';
        $data-> status = 'normal';
       
            // dd($data);
        $data-> save();

        // Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->back();
        
    }

    public function destroy($id)
    {
        $data = Products::find($id);

        $data->delete();

        return redirect()->back();
    }

}
