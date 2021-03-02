@extends('layout.main')
@section('title', 'Daftar Transaksi')
@section('container')


<div class="container-fluid col-6">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> KasirKU
                  <small class="float-right">Date: {{now()}}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>


            <!-- Table row -->
            <div class="row my-3">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  @php
                      $jum = 0;
                  @endphp
                  @foreach ($modal as $modals => $item)
                  <tbody>
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->sell_price}}</td>
                      <td>{{$item->total}}</td>
                      <td>{{$item->total_price}}</td>
                    </tr>
                  @php
                      
                      $jum += $item->total_price;
                      
                  @endphp
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Senang bisa melayani anda dengan baik!!
                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Detail Belanja</p>

                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                    <tr>
                      <th>Total:</th>
                      <td>@php
                        echo "Rp. ". number_format($jum) . "-";
                    @endphp</td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="" onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection