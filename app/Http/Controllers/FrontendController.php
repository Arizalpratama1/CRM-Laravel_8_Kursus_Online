<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentor;
use App\Models\Kelas;
use App\Models\Video;

class FrontendController extends Controller
{
    public function index(){

        $tentor = Tentor::all();
        $kelas = Kelas::all();

        return view('frontend.index', compact(
            'tentor','kelas'
        ));
    }

    public function kelas(){
        $kelas = Kelas::all();
        
        return view('frontend.kelas', compact(
            'kelas'
        ));
    }

    public function kelasDetail($id){

        $kelas = Kelas::find($id);
        $video = Video::where('kelas_id', $id)->first();

        return view('frontend.kelasdetail', compact(
            'kelas','video'
        ));
    }
}
