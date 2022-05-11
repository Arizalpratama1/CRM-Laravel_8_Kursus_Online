@extends('layouts.vuexy')

@section('header')
Create Tentor ( Tambah Data Tentor )
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif


<a href="{{ url('/admin/tentor') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>

<hr>

<form action="{{ url('/admin/tentor') }}" enctype="multipart/form-data" method="POST">
<div class="col-md-6">
   <div class="card">
        <div class="card-body">
            @csrf

            <label>Kategori Tentor<span class="text-danger"><i>*</i></span></label>
            <select class="form-control" name="kategori_id" required>
                <option value="">-- PILIH KATEGORI TENTOR --</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
            
            <label>Nama Lengkap Tentor <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" name="nama_tentor" placeholder="Ex. ( Randy Bagus )" required>

            <label>No Telepon</label>
            <input type="number" class="form-control" name="no_telp" placeholder="Ex. ( 0876546245343 )">

            <label>Alamat</label>
            <textarea class="form-control" rows="4" name="alamat" placeholder="Ex. ( Jl.Gambir No.5 )"></textarea>
            
            <label>Deskripsi Tentor( Summary )</label>
            <textarea class="form-control" rows="4" name="deskripsi" placeholder="Ex. ( Web Programmer with 1+ years experience in developing, testing, and maintaining enterprise software application. Designed and developed over 5 advanced applications from use cases to functional requirements.  )"></textarea>

            <label>Foto Profil Tentor<span class="text-danger"><i>*</i></span></label>
            <input type="file" name="profil" class="form-control" required>
        </div>
    </div> 
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <!-- <button class="btn btn-outline-secondary" name="lagi" type="submit">Simpan & Baru</button> -->
            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-save"></i>&nbsp Simpan</button>
            <a href="/admin/tentor" class="btn btn-outline-danger"><i class="fas fa-backward"></i>&nbsp Batal</a>
        </div>
    </div>
</div>
</form>
@endsection