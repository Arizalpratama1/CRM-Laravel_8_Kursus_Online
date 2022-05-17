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

<div class="row">
<div class="col-md-6">
   <div class="card">
        <div class="card-body">

            <img class="m-2 shadow profile_img" src="{{ url('uploads/event/'.$event->foto_event) }}" id="previewpicture"><br>

            <label>Nama Event <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" value="{{ $event->nama_event }}" readonly name="nama_event" placeholder="Ex. ( Seminar Digital Marketing )" required>

            <label>Tanggal Event <span class="text-danger"><i>*</i></span></label>
            <input type="date" class="form-control" value="{{ $event->tgl_event }}" readonly name="tgl_event" id="tgl_event" value="{{ old('tgl_event') }}" required>
            
            <label>Jam Event <span class="text-danger"><i>*</i></span></label>
            <input type="time" class="form-control" value="{{ $event->jam_event }}" readonly name="jam_event" id="jam_event" value="{{ old('jam_event') }}" required>
            
            <label>Link Pendaftaran Event <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" value="{{ $event->link_event }}" readonly name="link_event" value="{{ old('link_event') }}" required>

            <label>Lokasi</label>
            <input type="text" class="form-control" value="{{ $event->lokasi }}" readonly>
            
            <!-- <label>Foto event <span class="text-danger"><i>*</i></span></label>
            <input type="file" value="" readonly name="foto_event" class="form-control" required> -->

            <label>Deskripsi</label>
            <textarea class="form-control" rows="4" readonly name="deskripsi" placeholder="Masukkan Deskripsi....">{{ $event->deskripsi }}</textarea>
        </div>
    </div> 
</div>

<div class="col-md-12">
<form action="/admin/event/{{ $event->id }}" method="POST">
    <div class="card">
        <div class="card-body">
            <!-- <button class="btn btn-outline-secondary" name="lagi" type="submit">Simpan & Baru</button> -->
            <a href="/admin/event/{{ $event->id }}/edit" class="btn btn-outline-warning" type="submit"><i class="fas fa-edit"></i>&nbsp Edit</a>
                @csrf
                @method('DELETE')
                <button onclick="hapusFunction()" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i>&nbsp Hapus</button>
        </div>
    </div>
</form>
</div>
@endsection

@section('myjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script type="text/javascript">
function hapusFunction() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
        swal({
        title: "Are you sure?",
        text: "Apakah Anda yakin akan menghapus data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#a90808",
        cancelButtonColor: "#87a182",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak, Jangan Hapus!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm){
    if (isConfirm) {
        form.submit();          // submitting the form when user press yes
    } else {
        swal("Cancelled", "Data Batal Terhapus!", "error");
    }
    });
}
</script>
@endsection