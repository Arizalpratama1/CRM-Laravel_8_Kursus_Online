@extends('layouts.vuexy')

@section('header')
{{ $video_id->judul }}
@endsection


@section('content')
<br>
<a href="{{ url('/siswa/detail-kelas-saya/'. $kelas->id) }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>
<br>
<br>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-0">
            <div class="embed-responsive embed-responsive-16by9">
                <embed class="embed-responsive-item" width="640" height="360" src="{{ $video_id->link }} " frameborder="0" allowfullscreen></embed>
            </div>
            <div>
                <br><br><br>
                <h3>{{ $video_id->deskripsi }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@section('myjs')
<script>
    document.getElementsByTagName('embed')[0].contentWindow.getElementsByClassName('ytp-watch-later-button')[0].style.display = 'none';
</script>
@endsection
