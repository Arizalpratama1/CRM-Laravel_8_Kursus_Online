@extends('layouts.vuexy')

@section('header')
Create Class( Tambah Data Kelas)
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif

<a href="{{ url('/admin/kelas') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>

<hr>

<form autocomplete="off" action="{{ url('/admin/kelas') }}" enctype="multipart/form-data" method="POST">
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @csrf

                <label>Tentor Kelas<span class="text-danger"><i>*</i></span></label>
                <select class="form-control" name="tentor_id" required>
                    <option value="">-- PILIH TENTOR --</option>
                    @foreach($tentor as $tent)
                        <option value="{{ $tent->id }}">
                        {{ $tent->nama_tentor }} | {{ $tent->kategorikelas->nama_kategori }}
                        </option>
                    @endforeach
                    
                </select>
                
                <!-- <input type="text" value="{{ $tent->kategori_id }}" name="kategori_id"> -->
                <label>Kategori Kelas<span class="text-danger"><i>*</i></span></label>
                <select class="form-control" name="kategori_id" required>
                    <option value="">-- PILIH KATEGORI KELAS --</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>

                <label>Nama kelas <span class="text-danger"><i>*</i></span></label>
                <input type="text" class="form-control" name="nama_kelas" placeholder="Ex. ( Membuat Aplikasi Food Market Menggunakan Laravel )" required>

                <label>Harga Kelas <span class="text-danger"><i>*</i></span></label>
                <input type="text" class="form-control" name="nominal" id="nominal" value="{{ old('nominal') }}" required>

                <label>Foto Kelas <span class="text-danger"><i>*</i></span></label>
                <input type="file" name="foto_kelas" class="form-control" required>

                <label>Deskripsi</label>
                <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan Deskripsi...."></textarea>
            </div>
        </div> 
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <label >Detail Video</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Judul" name="judul[]" aria-label="Judul" aria-describedby="button-addon2">
                    <input type="text" class="form-control" placeholder="Link" name="link[]" aria-label="Link" aria-describedby="button-addon2">
                    <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi2[]" aria-label="Link" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary add_detail" type="button" id="button-addon2">Tambah</button>
                </div>
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
            <a href="{{ url('/admin/kelas') }}" class="btn btn-outline-danger"><i class="fas fa-backward"></i>&nbsp Batal</a>
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