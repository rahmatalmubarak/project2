<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use App\Models\Detail;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class TransactionController extends Controller
{
    public function index()
    {

        $transaksi = DB::table('transaction')->join('account','transaction.account_id','=','account.id')
        ->select('transaction.*', 'account.name')
        ->get();
       

        return view('transaction.index', compact('transaksi'));
    }

   public function create()
   {
       $product = product::all();
       $transaksi = Transaction::count();
        $id=0;

       if ($transaksi != 0) {
           $id = Transaction::latest('id')->first();
           $ids = $id->id;
        }else{
                $ids=0;
        }

      return view('transaction.create', compact('product', 'ids'));

   }    

   public function store(Request $request) 
   {
    $request->validate([
        'idAkun' => 'required',
        'produk' => 'required',
        'jumlah' => 'required'
    ]);
    try{
        
     
        $hasil = 0;
        $tambah = 0;
        $tambah2 = 0;
        for ($i=0; $i < count($request->jumlah); $i++) { 
            $sell = DB::table('product')->where('id',$request->produk[$i])->value('sell_price');
            $capital = DB::table('product')->where('id',$request->product[$i])->value('capital_price');
            $tambah = ($request->jumlah[$i] * $sell);
            $tambah2 = $request->jumlah[$i] * $capital;
            $hasil = $tambah - $tambah2;
        }
        $transaksi = new Transaction();
        $transaksi->id = $request->id;  
        $transaksi->account_id = $request->idAkun;
        $transaksi->date = now();
        $transaksi->profit = $hasil;
        $transaksi->save();
        $jm=0;
        for ($i=0; $i < count($request->jumlah); $i++) { 
        $product = product::where('id', $request->produk[$i])->first();
       
        if ($product->stock_last >= $request->jumlah[$i]) {
            $jm +=1;
            
        }
    }
         
      for ($i=0; $i < count($request->jumlah); $i++) { 
             $sell = DB::table('product')->where('id',$request->produk[$i])->value('sell_price');
             $capital = DB::table('product')->where('id',$request->product[$i])->value('capital_price');
             $tambah = ($request->jumlah[$i] * $sell);
             $tambah2 = $request->jumlah[$i] * $capital;
             $hasil = $tambah - $tambah2;
             $data = new Detail();
             $data->product_id = $request->produk[$i];
             $data->transaction_id = $request->id;
             $data->total = $request->jumlah[$i];
             $data->total_price = $request->jumlah[$i] * $sell;
             $data->save();    
      }
       return redirect('/transaction')->with('status', 'Transaksi Berhasil');
    //    return redirect()->back();

     } catch (\Throwable $th) {
         throw $th;
     }

   }
   public function delete($id) 
   {
    //    dd($id);
       Transaction::destroy($id);
       return redirect()->back();
   }
}
