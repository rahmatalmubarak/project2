@extends('layout.main')
@section('title', 'Tambahkan data')

@section('container')
<div class="col-md-6 my-3 mx-auto">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input Transaksi</h3>
        </div>
    </div>
    <form action="/account" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" id="name" name="name" value="{{old('name')}}">
        @error('name')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group my-3">
            <label for="formGroupExampleInput2">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control  @error('gender') is-invalid @enderror">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            {{-- <input type="text" class="form-control  @error('gender') is-invalid @enderror" placeholder="" id="formGroupExampleInput2" value="{{old('gender')}}" name="gender"> --}}
            
        </div>
        <div class="form-group my-3">
            <label for="username">Username</label>
            <input type="text" class="form-control  @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="" id="username" name="username">
            @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group my-3">
            <label for="password">password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" placeholder="" id="password" name="password">
            @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group my-3">
            <label for="role">role</label>
            <select name="role" id="role" class="form-control  @error('gender') is-invalid @enderror">
                <option value="Admin">Admin</option>
                <option value="Customer">Customer</option>
            </select>
            {{-- <input type="text" class="form-control  @error('role') is-invalid @enderror" placeholder="" id="role" name="role" value="{{old('username')}}"> --}}
            @error('role')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
    </form>
</div>
@endsection
