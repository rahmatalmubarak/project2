<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 //  try {

            //      $hasil = 0;
            //      $tambah = 0;
            //      $tambah2 = 0;
            //      for ($i=0; $i < count($request->jumlah); $i++) { 
            //          $sell = DB::table('product')->where('id',$request->product[$i])->value('sell_price');
            //          // $capital = DB::table('product')->where('id',$request->product[$i])->value('capital_price');
            //          // $tambah = ($request->jumlah[$i] * $sell);
            //          // $tambah2 = $request->jumlah[$i] * $capital;
            //          // $hasil = $tambah - $tambah2;
            //          // // dd($sell);
            //          $data = new Detail();
            //          $data->product_id = $request->product[$i];
            //          $data->transaction_id = $request->id;
            //          $data->total = $request->jumlah[$i];
            //          $data->total_price = $request->jumlah[$i] * $sell;
            //          $data->save();
            //      }
            //      $transaksi = new Transactions();
                //  $transaksi->id = $request->id;  
                //  $transaksi->account_id = $request->idname;
                //    $transaksi->date = now();
                //    $transaksi->profit = '123';
                //    $transaksi->save();
            //    return redirect('/transaction')->with('status', 'Transaksi Berhasil');
    
            //  } catch (\Throwable $th) {
            //      throw $th;
            //  }
                 
}

