@extends('layouts.vuexy')

@section('header')
List Video Kelas
@endsection


@section('content')
<br>
<a href="{{ url('/siswa/kelas-saya') }}">
    <i class="fa fa-arrow-left"></i> Kembali ke daftar
</a>
<br>
<br>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-21 px-0 bg-primary">
            <div class="d-flex flex-column align-items-left align-items-sm-start text-white px-1 pt-2 min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 text-white align-items-left align-items-sm-start" id="main-menu-navigation" data-menu="menu-navigation">
                    @foreach($video as $vid)
                    <li class="nav-item text-white">
                        <a href="{{ $vid->link }}" onclick="showVideo(this);return false;" class="nav-link align-left px-0">
                        <!-- <a href="{{ url('/siswa/detail-kelas-saya/'. $kelas->id) }}/{{$vid->id}}" class="nav-link align-left px-0"> -->
                            <i data-feather="circle"></i><span class="ms-1 d-none d-sm-inline text-white">{{ $vid->judul }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <hr>
            </div>
        </div>
        
        <div class="col py-0">
            <div class="embed-responsive embed-responsive-16by9">
                <embed id="video" class="embed-responsive-item" width="640" height="360" src="{{ $vid->link }}" frameborder="0" allowfullscreen></embed>
            </div> 
        </div>
    </div>
</div>
@endsection
@section('myjs')
<script>
    function showVideo(whichvideo){
    var source=whichvideo.getAttribute("href");
    var game=document.getElementById("video");
    var clone=game.cloneNode(true);
    clone.setAttribute('src',source);
    game.parentNode.replaceChild(clone,game)
}
</script>
@endsection
