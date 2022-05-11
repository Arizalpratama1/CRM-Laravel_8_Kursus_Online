@extends('layouts.vuexy')

@section('header')
Detail Class
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif

<a href="{{ url('/admin/kelas') }}">
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

            <img class="m-2 shadow profile_img" src="{{ url('uploads/kelas/'.$kelas->foto_kelas) }}" id="previewpicture"><br>

            <label>Tentor Kelas<span class="text-danger"><i>*</i></span></label>
            <select class="form-control" readonly name="tentor_id" required>
                <option value="">{{ $kelas->tentor->nama_tentor }}</option>
            </select>
            
            <label>Kategori Kelas<span class="text-danger"><i>*</i></span></label>
             <select class="form-control" readonly name="kategori_id" required>
                <option value="">{{ $kelas->kategorikelas->nama_kategori }}</option>
            </select>

            <label>Nama kelas <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" value="{{ $kelas->nama_kelas }}" readonly name="nama_kelas" placeholder="Ex. ( Membuat Aplikasi Food Market Menggunakan Laravel )" required>

            <label>Harga Kelas <span class="text-danger"><i>*</i></span></label>
            <input type="text" class="form-control" value="{{ rupiah($kelas->nominal) }}" readonly name="nominal" id="nominal" value="{{ old('nominal') }}" required>

            <!-- <label>Foto Kelas <span class="text-danger"><i>*</i></span></label>
            <input type="file" value="" readonly name="foto_kelas" class="form-control" required> -->

            <label>Deskripsi</label>
            <textarea class="form-control" rows="4" readonly name="deskripsi" placeholder="Masukkan Deskripsi....">{{ $kelas->deskripsi }}</textarea>
        </div>
    </div> 
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <label >Detail Video</label> <br>
            @foreach($kelas->videos as $vid)
                <label>Judul</label> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;&emsp;&emsp; <label>link</label> &emsp; &emsp; &emsp;&emsp;&emsp;&emsp; &emsp; &emsp;&emsp; &emsp; <label>Deskripsi</label> &emsp;
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Judul" readonly value="{{ $vid->judul }}" name="judul[]" aria-label="Judul" aria-describedby="button-addon2">
                    <input type="text" class="form-control" placeholder="Link" readonly value="{{ $vid->link }}" name="link[]" aria-label="Link" aria-describedby="button-addon2">
                    <input type="text" class="form-control" placeholder="Deskripsi" readonly value="{{ $vid->deskripsi }}" name="deskripsi2[]" aria-label="Link" aria-describedby="button-addon2">
                </div>
            @endforeach
            <div id="extra-detail"></div>
        </div>
    </div>
</div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <!-- <button class="btn btn-outline-secondary" name="lagi" type="submit">Simpan & Baru</button> -->
            <a href="/admin/kelas/{{ $kelas->id }}/edit" class="btn btn-outline-warning" type="submit"><i class="fas fa-edit"></i>&nbsp Edit</a>
                @csrf
                @method('DELETE')
                <button onclick="hapusFunction()" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i>&nbsp Hapus</button>
        </div>
    </div>
</div>
</form>
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