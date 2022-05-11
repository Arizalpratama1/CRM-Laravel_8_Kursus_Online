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

<div class="col-md-6">
   <div class="card">
        <div class="card-body">
            
            <label>Nama Kategori Kelas <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" readonly name="nama_kategori" placeholder="Ex. ( Web Programmer )" value="{{ $kategori->nama_kategori }}">
            
            <label>Deskripsi</label>
            <textarea class="form-control" rows="4" readonly name="deskripsi" placeholder="Masukkan Deskripsi....">{{ $kategori->deskripsi }}</textarea>
        </div>
    </div> 
</div>

<div class="col-md-12">
    <form action="/admin/kategori/{{ $kategori->id }}" method="POST">
        <div class="card">
            <div class="card-body">
            <a href="/admin/kategori/{{ $kategori->id }}/edit" class="btn btn-outline-warning" type="submit"><i class="fas fa-edit"></i>&nbsp Edit</a>
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