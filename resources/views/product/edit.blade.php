@extends('layout.main')
@section('title', 'Tambahkan produk')
@section('container')

<div class="container">
    <div class="row col-6 offset-2">

        <h2 class="my-3">Edit Product</h2>

        <form action="/edit/{{$product->id}}" method="post">
            @method('patch')
            @csrf   
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" class="form-control" placeholder="" id="name"
                    name="name" value="{{$product->name}}">
           </div>
            <div class="form-group my-3">
                <label for="formGroupExampleInput2">Jenis Kelamin</label>
                <select name="type" id="type" class="form-control">
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                </select>

            </div>
            <div class="form-group my-3">
                <label for="capital_price">Modal</label>
                <input type="number" class="form-control"
                    value="{{$product->capital_price}}" placeholder="" id="capital_price" name="capital_price">
          </div>
            <div class="form-group my-3">
                <label for="sell_price">Harga Jual</label>
                <input type="number" class="form-control"
                    value="{{$product->sell_price}}" placeholder="" id="sell_price" name="sell_price">
           </div>
            <div class="form-group my-3">
                <label for="stock_last">Stok</label>
                <input type="number" name="stock_last" id="stock_last"
                    class="form-control" value="{{$product->stock_last}}"
                    placeholder="" id="stock_last" name="stock_last">
               </div>
            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection
