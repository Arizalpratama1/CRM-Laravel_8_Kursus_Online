@extends('layouts.vuexy')

@section('header')
List Kelas
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif
<div class="row" data-aos="zoom-in" data-aos-delay="100">
    @foreach($kelas as $kelas)
    <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
        <div class="card" style="width: 20rem;">
            <img src="{{ asset('uploads/kelas/' . $kelas->foto_kelas ) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{ $kelas->kategorikelas->nama_kategori }}</h4>
                    <p class="price">{{ rupiah($kelas->nominal) }}</p>
                </div>

                <h3><a href="{{ url('/siswa/list-kelas/beli/'. $kelas->id) }}">{{ $kelas->nama_kelas }}</a></h3>
            </div>
                <a href="{{ url('/siswa/list-kelas/beli/'. $kelas->id) }}" type="button" class="btn btn-primary">
                <i class="fas fa-shopping-cart"></i>&nbsp Lihat Detail Kelas</a>
        </div>
    </div> <!-- End Course Item-->
    @endforeach
</div>
<!-- Ecommerce Products Ends -->
@endsection