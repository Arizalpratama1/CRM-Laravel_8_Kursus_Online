@extends ('layouts.vuexy')

@section('header')
List Kelas Yang Telah di Beli
@endsection

@section('content')
<div class="card">
    <div class="card-body">
    <div class="badge badge-light-danger">Halaman Kelas Saya Kosong</div> karena anda belum membeli kelas / belum menyelesaikan pembayaran.
        <a href="{{ url('/siswa/pembayaran') }}">kembali</a>
    </div>
</div>
@endsection
