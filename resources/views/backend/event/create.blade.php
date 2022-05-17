@extends('layouts.vuexy')

@section('header')
Create Event( Tambah Data event)
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif

<a href="{{ url('/admin/event') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>

<hr>

<form action="{{ url('/admin/event') }}"enctype="multipart/form-data" method="POST">
<div class="col-md-6">
   <div class="card">
        <div class="card-body">
            @csrf
            <label>Nama Event <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" name="nama_event" placeholder="Ex. ( Seminar Digital Marketing )" required>
            
            <label>Tanggal Event <span class="text-danger"><i>*</i></span></label>
            <input type="date" class="form-control" name="tgl_event" required>
            
            <label>Jam Event <span class="text-danger"><i>*</i></span></label>
            <input type="time" class="form-control" name="jam_event" required>
            
            <label>Link Pendaftaran Event <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" name="link_event" placeholder="Ex. ( https://googleformulir )" required>
            
            <label>Lokasi Event </label>
            <input type="text" class="form-control" name="lokasi" placeholder="Ex. ( UPN Veteran Jatim )">
            
            <label>Foto Event <span class="text-danger"><i>*</i></span></label>
            <input type="file" class="form-control" name="foto_event" required>
            
            <label>Deskripsi <span class="text-danger"><i>*</i></span></label>
            <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan Deskripsi...." required></textarea>
        </div>
    </div> 
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <!-- <button class="btn btn-outline-secondary" name="lagi" type="submit">Simpan & Baru</button> -->
            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-save"></i>&nbsp Simpan</button>
            <a href="{{ url('/admin/event') }}" class="btn btn-outline-danger"><i class="fas fa-backward"></i>&nbsp Batal</a>
        </div>
    </div>
</div>
</form>
@endsection