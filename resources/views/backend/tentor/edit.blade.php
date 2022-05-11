@extends('layouts.vuexy')

@section('header')
Edit Data Tentor
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif
<style>
    .card-body .profile_img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 2px auto;
    border: 2px solid #ccc;
    border-radius: 50%;
}
</style>

<a href="{{ url('/admin/tentor/'. $tentor->id) }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>

<hr>

<form action="{{ url('/admin/tentor/'. $tentor->id) }}" enctype="multipart/form-data" method="POST">
<div class="col-md-6">
   <div class="card">
        <div class="card-body" >
            @csrf
            @method('PUT')

            <img class="m-2 shadow profile_img" src="{{ url('uploads/tentor/'.$tentor->profil) }}" id="previewpicture"><br>
            
            <label>Kategori Tentor <span class="text-danger"><i>*</i></span></label>
            <select class="form-control" name="kategori_id" required>
                <option value="">-- PILIH KATEGORI TENTOR --</option>
                @foreach($kategori as $kategori)
                    <option value="{{ $kategori->id }}" {{ $tentor->kategorikelas->id === $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>

            <label>Nama Lengkap Tentor <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" name="nama_tentor" placeholder="Ex. ( Randy Bagus )" value="{{ $tentor->nama_tentor }}" required>

            <label>No Telepon</label>
            <input type="number" class="form-control" name="no_telp" placeholder="Ex. ( 0876546245343 )" value="{{ $tentor->no_telp }}">

            <label>Alamat</label>
            <textarea class="form-control" rows="4" name="alamat" placeholder="Ex. ( Jl.Gambir No.5 )">{{ $tentor->alamat }}</textarea>
            
            <label>Deskripsi Tentor( Summary )</label>
            <textarea class="form-control" rows="4" name="deskripsi" placeholder="Ex. ( Web Programmer with 1+ years experience in developing, testing, and maintaining enterprise software application. Designed and developed over 5 advanced applications from use cases to functional requirements.  )">{{ $tentor->deskripsi }}</textarea>

            <label>Foto Profil Tentor <span class="text-danger"><i>*</i></span> abaikan jika tidak ingin mengubah gambar</label>
            <input type="file" name="profil" id="berkas_1" class="form-control">
        </div>
    </div> 
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
        <button class="btn btn-outline-primary" type="submit"><i class="fa fa-save"></i>&nbsp Simpan</button>
        <a href="{{ url('/admin/tentor') }}" class="btn btn-outline-danger"><i class="fas fa-backward"></i>&nbsp Batal</a>
        </div>
    </div>
</div>
</form>
@endsection