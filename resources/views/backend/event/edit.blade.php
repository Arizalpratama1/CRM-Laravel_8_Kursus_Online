@extends('layouts.vuexy')

@section('header')
Detail Master Event
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif

<a href="{{ url('/admin/event') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>

<hr>
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

<form action="{{ url('/admin/event/' . $event->id) }}" enctype="multipart/form-data" method="POST">
<div class="row">
<div class="col-md-6">
   <div class="card">
        <div class="card-body">
            @csrf
            @method('PUT')
            <label>Nama Event <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" value="{{ $event->nama_event }}"  name="nama_event" placeholder="Ex. ( Seminar Digital Marketing )" required>

            <label>Tanggal Event <span class="text-danger"><i>*</i></span></label>
            <input type="date" class="form-control" value="{{ $event->tgl_event }}"  name="tgl_event" id="tgl_event" value="{{ old('tgl_event') }}" required>
            
            <label>Jam Event <span class="text-danger"><i>*</i></span></label>
            <input type="time" class="form-control" value="{{ $event->jam_event }}"  name="jam_event" id="jam_event" value="{{ old('jam_event') }}" required>

            <label>Lokasi</label>
            <input type="text" class="form-control" name="lokasi" value="{{ $event->lokasi }}" >
            
            <label>Link Pendaftaran</label>
            <input type="text" class="form-control" name="link_event" value="{{ $event->link_event }}" >
            
            <label>Foto event <span class="text-danger"><i>*</i></span> Abaikan jika tidak ingin mengubah gambar</label>
            <input type="file" name="foto_event" class="form-control">

            <label>Deskripsi</label>
            <textarea class="form-control" rows="4"  name="deskripsi" placeholder="Masukkan Deskripsi....">{{ $event->deskripsi }}</textarea>
        </div>
    </div> 
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-save"></i>&nbsp Simpan</button>
            <a href="{{ url('/admin/event/' . $event->id) }}" class="btn btn-outline-danger"><i class="fas fa-backward"></i>&nbsp Batal</a>
        </div>
    </div>
</div>
</form>
@endsection