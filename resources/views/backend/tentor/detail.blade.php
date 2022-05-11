@extends('layouts.vuexy')

@section('header')
Detail Data Tentor
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

<a href="{{ url('/admin/tentor/') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>

<hr>

<div class="col-md-6">
   <div class="card">
        <div class="card-body">
            <img class="m-2 shadow profile_img" src="{{ url('uploads/tentor/'.$tentor->profil) }}" id="previewpicture"><br>
            
            <label>Kategori Tentor <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" readonly name="nama_tentor" placeholder="Ex. ( Randy Bagus )" value="{{ $tentor->kategorikelas->nama_kategori }}">

            <label>Nama Lengkap Tentor <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" readonly name="nama_tentor" placeholder="Ex. ( Randy Bagus )" value="{{ $tentor->nama_tentor }}">

            <label>No Telepon</label>
            <input type="number" class="form-control" readonly name="no_telp" placeholder="Ex. ( 0876546245343 )" value="{{ $tentor->no_telp }}">

            <label>Alamat</label>
            <textarea class="form-control" rows="4" readonly name="alamat" placeholder="Ex. ( Jl.Gambir No.5 )">{{ $tentor->alamat }}</textarea>
            
            <label>Deskripsi Tentor( Summary )</label>
            <textarea class="form-control" rows="4" readonly name="deskripsi" placeholder="Ex. ( Web Programmer with 1+ years experience in developing, testing, and maintaining enterprise software application. Designed and developed over 5 advanced applications from use cases to functional requirements.  )">{{ $tentor->deskripsi }}</textarea>
        </div>
    </div> 
</div>

<div class="col-md-12">
    <form action="/admin/tentor/{{ $tentor->id }}" method="POST">
        <div class="card">
            <div class="card-body">
                <a href="/admin/tentor/{{ $tentor->id }}/edit" class="btn btn-outline-warning" type="submit"><i class="fas fa-edit"></i>&nbsp Edit</a>
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