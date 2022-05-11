@extends('layouts.vuexy')

@section('header')
Detail Kelas | {{ $video->judul }} 
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif
<br>
<a href="{{ url('/siswa/list-kelas') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>
<br>
<br>
<form action="{{ url('/siswa/list-kelas/beli/'. $kelas->id) }}" method="POST">
<div class="row">
    <div class="col-lg-7">
        <iframe class="embed-responsive-item" width="640" height="360" src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
    
        <h3>{{$video->judul}} | Deskripsi Kelas</h3>
        <p>
            {{ $kelas->deskripsi}}
        </p>
    </div>

    <div class="col-lg-5">
        @csrf
        <input type="hidden" value="{{ $kelas->id }}"></input>
        <input type="hidden" value="{{ $kelas->nominal }}"></input>
        
        <div class="d-flex justify-content-between align-items-center">
            <h5>Nama Tentor</h5>
            <p><a href="#">{{ $kelas->tentor->nama_tentor }}</a></p>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h5>Kategori Kelas</h5>
            <p>{{ $kelas->kategorikelas->nama_kategori }}</p>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h5>Nama Kelas</h5>
            <p>{{ $kelas->nama_kelas }}</p>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h5>Biaya Kelas</h5>
            <p>{{ rupiah($kelas->nominal) }}</p>
        </div>

        <div class="d-grid gap-2 mx-auto">
            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp Beli</a></button>
        </div>

    </div>
</div>
</form>
@endsection