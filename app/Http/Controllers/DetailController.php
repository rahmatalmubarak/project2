<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Transaction;
// use Barryvdh\DomPDF\PDF;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


set_time_limit(300);

class DetailController extends Controller
{
    public function show($id) 
    {
        $modal = Detail::join('product', 'product.id', '=', 'detail.product_id')
        ->where('transaction_id', $id)
        ->get();
        return view('detail.cetak', compact('modal'));
    }

    public function cetak($id) 
    {
        $cetak = Detail::join('product', 'product.id', '=', 'detail.product_id')
        ->where('transaction_id', $id)
        ->get();
        $pdf = PDF::loadview('detail.cetak', ['modal' => $cetak]);
        return $pdf->download();
        
    }

  public function tes($id) {
    $modal = Detail::join('product', 'product.id', '=', 'detail.product_id')
    ->where('transaction_id', $id)
    ->get();
    $pdf = PDF::loadview('detail.show', compact('modal'));
    return $pdf->download('tes');
  }
}
