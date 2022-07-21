<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
//in
    public function in(){
        $in = Products::where('jenis','masuk')->get();

        return view('products.in',compact('in'));
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
//out
    public function out(){
        $sold= Products::all();

        return view('products.out',compact('sold'));

    }
    public function editOut(Request $request,$id) {
        $out = Products::where('id',$id)->firstOrFail();

        $request->validate([
            
            
            'keluar' => 'required',
            'qty_k' => 'required',
        ]);
        // dd($request);
        
       
        $out->keluar = $request->keluar;
        $out->qty_m = $out->qty_m - $request->qty_k;
        $out->qty_k = $out->qty_k + $request->qty_k;

        // dd($data);
        $out->update();

        return redirect()->back();
    }
//sale
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
//trash
    public function trash(){
        $trash = Products::all();

        return view('products.trash',compact('trash'));

    }
    public function editTrash(Request $request,$id) {
        $trash = Products::where('id',$id)->firstOrFail();

        $request->validate([
            
            
            'rusak' => 'required',
            'qty_r' => 'required',
        ]);
        // dd($request);
        
       
        $trash->rusak = $request->rusak;
        $trash->qty_m = $trash->qty_m - $request->qty_r;
        $trash->qty_r = $trash->qty_r + $request->qty_r;

        // dd($data);
        $trash->update();

        return redirect()->back();
    }
//delete
    public function destroy($id){
        $data = Products::find($id);

        $data->delete();

        return redirect()->back();
    }

}
