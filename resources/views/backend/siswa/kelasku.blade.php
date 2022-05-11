@extends('layouts.vuexy')

@section('header')
List Kelas Yang Telah di Beli
@endsection


@section('content')

@if($errors->all())
    @include('layouts.validation')
@endif
<div class="row" data-aos="zoom-in" data-aos-delay="100">
    @foreach($order as $kelas)
    <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
        <div class="card" style="width: 20rem;">
            <img src="{{ asset('uploads/kelas/' . $kelas->kelas->foto_kelas ) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{ $kelas->kelas->kategorikelas->nama_kategori }}</h4>
                    <p class="price">{{ rupiah($kelas->nominal) }}</p>
                </div>

                <h3><a href="{{ url('/siswa/detail-kelas-saya/'. $kelas->kelas->id) }}">{{ $kelas->kelas->nama_kelas }}</a></h3>
            </div>
                <a href="{{ url('/siswa/detail-kelas-saya/'. $kelas->kelas->id) }}" type="button" class="btn btn-primary">
                <i class="fas fa-chalkboard-teacher"></i>&nbsp Mulai Belajar</a>
        </div>
    </div> <!-- End Course Item-->
    @endforeach
</div>
<!-- Ecommerce Products Ends -->
@endsection