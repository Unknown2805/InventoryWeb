<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
//in
    public function in(){
        $in = Products::where('jenis','masuk')->get();

        return view('products.in',compact('in'));
    }
    public function cetak_in_pdf(){
        $in= Products::all();

        $pdf = PDF::loadview('pdf.rekap_in_pdf',['in'=>$in]);
        return $pdf->download('laporan-barang-masuk.pdf');
    }
    public function storeIn(Request $request) {
        $this->validate($request,[
            'suppliers' => 'required',
            'barang' => 'required',
            'transport' => 'required',
            'masuk' => 'required',
            'qty_m' => 'required',
            

        ]);

        $in = new Products();
        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $pengiriman = preg_replace("/[^0-9]/","",$request->transport);
        $in-> suppliers = $request->suppliers;
        $in-> barang = $request-> barang;
        $in-> transport = $pengiriman;
        $in-> masuk = $result;
        $in-> qty_m = $request-> qty_m;        
        $in-> jenis = 'masuk';
        $in->created_at = Carbon::parse()->format("d-M-Y", strtotime('created_at'));
            // dd($in);

            $in-> save();
            return redirect()->back();
    }

    public function editIn(Request $request,$id) {
        $in = Products::where('id',$id)->firstOrFail();

        $request->validate([
            'suppliers' => 'required',
            'barang' => 'required',
            'transport' => 'required',
            'masuk' => 'required',
            'qty_m' => 'required',
        ]);
        // dd($request);

        if($request->masuk == null){
            return redirect()->back();
        }else{

            $result2 = preg_replace("/[^0-9]/", "", $request->masuk);
            $pengiriman2 = preg_replace("/[^0-9]/", "", $request->transport);
            $in->suppliers = $request->suppliers;
            $in->transport = $pengiriman2;
            $in->barang = $request->barang;
            $in->masuk = $result2;
            $in->qty_m = $request->qty_m;
    
            // dd($in);
            
            $in->update();
    
            return redirect()->back();
        }
    }
//out
    public function out(){
        $sold= Products::all();

        return view('products.out',compact('sold'));

    }
    public function cetak_out_pdf(){
        $sold= Products::all();

        $pdf = PDF::loadview('pdf.rekap_out_pdf',['sold'=>$sold]);
        return $pdf->download('laporan-rekap-barang.pdf');
    }
    public function addOut(Request $request,$id) {
        $out = Products::where('id',$id)->firstOrFail();

        $request->validate([
                      
            'keluar' => 'required',
        ]);
        // dd($request);
        
        $result3 = preg_replace("/[^0-9]/", "", $request->keluar);
        $out->keluar = $result3;

        // dd($data);
        if($result3 <= $out->masuk){
            return redirect()->back();

        }elseif($result3 >= $out->masuk){

            $out->update();
            return redirect()->back();
        }
        
    }
    public function editOut(Request $request,$id) {
        $out = Products::where('id',$id)->firstOrFail();

        $request->validate([
            
            
            'qty_k' => 'required',
        ]);
        // dd($request);
        
       
        $out->qty_m = $out->qty_m - $request->qty_k;
        $out->qty_k = $out->qty_k + $request->qty_k;

        // dd($data);
        

            $out->update();
            return redirect()->back();
        
    }
    

//sale
    public function sale(){
        $sale = Products::all();

        return view('products.sale',compact('sale'));
        
    }
//trash
    public function trash(){
        $trash = Products::all();
        
        return view('products.trash',compact('trash'));
        
    }
    public function editTrash(Request $request,$id) {
        $trash = Products::where('id',$id)->firstOrFail();
        
        $request->validate([
            'qty_r' => 'required',
        ]);
        // dd($request);
        
        if($request->qty_r == 0){
            $trash->qty_m = $trash->qty_m + $trash->qty_r;
            $trash->qty_r = 0;

        }elseif($request->qty_r >= 1){
        
        $trash->qty_m = ($trash->qty_m + $trash->qty_r) - $request->qty_r;
        $trash->qty_r = $request->qty_r;
        }
        
        // dd($data);
        $trash->update();
        
        return redirect()->back();
    }
    
//rekap
    public function reportProduct(){
        $data = Products::all();

        return view('products.rekap_product',compact('data'));
    }
    public function reportPenjualan(){
        $data = Products::all();

        return view('products.rekap_penjualan',compact('data'));
    }

    public function cetak_report_pdf(){
        $data= Products::all();

        $pdf = PDF::loadview('pdf.rekap_report_pdf',['data'=>$data]);
        return $pdf->download('laporan-rekap-barang.pdf');
    }
    public function cetak_periode_pdf(Request $request){
         
        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data= Products::whereBetween('created_at', [$tgl1, $tgl2])
                ->get();

        // dd($data);
        $pdf = PDF::loadview('pdf.rekap_report_pdf',['data'=>$data]);
        return $pdf->download('laporan-rekap-periode-barang.pdf');
    }




//delete
    public function destroy($id){
        $data = Products::find($id);

        $data->delete();

        return redirect()->back();
    }

}
