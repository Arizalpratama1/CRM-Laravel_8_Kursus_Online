@extends('layouts.vuexy')

@section('header')
Detail Kategori Kelas
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif

<a href="{{ url('/admin/kategori') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>

<hr>

<form action="{{ url('/admin/kategori/' . $kategori->id) }}" method="POST">
<div class="col-md-6">
   <div class="card">
        <div class="card-body">
            @csrf
            @method('PUT')
            <label>Nama Kategori Kelas <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" name="nama_kategori" placeholder="Ex. ( Web Programmer )" value="{{ $kategori->nama_kategori }}">
            
            <label>Deskripsi</label>
            <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan Deskripsi....">{{ $kategori->deskripsi }}</textarea>
        </div>
    </div> 
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-save"></i>&nbsp Simpan</button>
            <a href="{{ url('/admin/kategori') }}" class="btn btn-outline-danger"><i class="fas fa-backward"></i>&nbsp Batal</a>
        </div>
    </div>
</div>
@endsection