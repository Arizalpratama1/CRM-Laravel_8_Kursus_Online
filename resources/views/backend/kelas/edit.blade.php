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

<form action="{{ url('/admin/kelas/' . $kelas->id) }}" enctype="multipart/form-data" method="POST">
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @csrf
                @method('PUT')
                <img class="m-2 shadow profile_img" src="{{ url('uploads/kelas/'.$kelas->foto_kelas) }}" id="previewpicture"><br>

                <label>Tentor Kelas<span class="text-danger"><i>*</i></span></label>
                <select class="form-control" name="tentor_id" required>
                    <!-- <option value="{{ $kelas->tentor_id }}">{{ $kelas->tentor->nama_tentor }}</option> -->
                    @foreach($tentor as $tentor)
                        <option value="{{ $tentor->id }}" <?php if($tentor->id == $kelas->tentor_id){ echo 'selected'; } ?>>{{ $tentor->nama_tentor }} | {{$tentor->kategorikelas->nama_kategori}}</option>
                    @endforeach
                </select>
                
                <label>Kategori Kelas<span class="text-danger"><i>*</i></span></label>
                <select class="form-control" name="kategori_id" required>
                    @foreach($kategori as $kategori)
                        <option value="{{ $kategori->id }}" <?php if($kategori->id == $kelas->kategori_id){ echo 'selected'; } ?>>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>

                <label>Nama kelas <span class="text-danger"><i>*</i></span></label>
                <input type="text" class="form-control" value="{{ $kelas->nama_kelas }}" name="nama_kelas" placeholder="Ex. ( Membuat Aplikasi Food Market Menggunakan Laravel )" required>

                <label>Harga Kelas <span class="text-danger"><i>*</i></span></label>
                <input type="text" class="form-control" value="{{ $kelas->nominal }}" name="nominal" id="nominal" required>

                <label>Foto Kelas <span class="text-danger"><i>*</i></span> Abaikan jika tidak ingin mengubah gambar</label>
                <input type="file" name="foto_kelas" class="form-control">

                <label>Deskripsi</label>
                <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan Deskripsi....">{{ $kelas->deskripsi }}</textarea>
            </div>
        </div> 
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            
                @foreach($kelas->videos as $vid)
                    <div class="input-group mb-3">
                        <!-- <input type="text" value="{{ $vid->id }}" id=""> -->
                        <input type="hidden" name="video_rinci[]" value="{{ $vid->id }}" id="">
                        <input type="text" class="form-control" placeholder="Judul" value="{{ $vid->judul }}" name="judul[]" aria-label="Judul" aria-describedby="button-addon2">
                        <input type="text" class="form-control" placeholder="Link" value="{{ $vid->link }}" name="link[]" aria-label="Link" aria-describedby="button-addon2">
                        <input type="text" class="form-control" placeholder="Deskripsi" value="{{ $vid->deskripsi }}" name="deskripsi2[]" aria-label="Link" aria-describedby="button-addon2">
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
            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-save"></i>&nbsp Simpan</button>
            <a href="{{ url('/admin/kelas/' . $kelas->id) }}" class="btn btn-outline-danger"><i class="fas fa-backward"></i>&nbsp Batal</a>
        </div>
    </div>
</div>
</form>
@endsection

@section('myjs')
<script>
    const add = document.querySelectorAll(".input-group .add_detail")
    add.forEach(function(e){
        e.addEventListener('click', function(){
            let element = this.parentElement
            
            let newElement = document.createElement('div')
            newElement.classList.add('input-group', 'mb-3')
            newElement.innerHTML = `<input type="text" class="form-control" placeholder="Judul" name="judul[]" aria-label="Judul" aria-describedby="button-addon2">
                <input type="text" class="form-control" placeholder="Link" name="link[]" aria-label="Link" aria-describedby="button-addon2">
                <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi2[]" aria-label="Link" aria-describedby="button-addon2">
                <button class="btn btn-outline-danger remove_detail" type="button" id="button-addon2">Hapus</button>`
            document.getElementById('extra-detail').appendChild(newElement)

            document.querySelectorAll('.remove_detail').forEach(function(remove){
                remove.addEventListener('click',function(elmClick){
                    elmClick.target.parentElement.remove()
                    console.log(elmClick);
                })
            })
        })
    })
</script>

<script type="text/javascript">

    //format rupiah
    var nominal = document.getElementById('nominal');
    nominal.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatnominal() untuk mengubah angka yang di ketik menjadi format angka
        nominal.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi NoHP */
    function NoHP(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
    
        return false;
        return true;
    }

    $(document).ready(function(){
        $("#email").on('input', function(){
            $(this).val( $(this).val().toLowerCase() );
        })
    });


    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    

    function previewFile(input){
        var file = $("input[name=picture]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewpicture").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

</script>
@endsection