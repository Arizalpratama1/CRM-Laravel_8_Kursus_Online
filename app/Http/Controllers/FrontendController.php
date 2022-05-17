<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentor;
use App\Models\Kelas;
use App\Models\Video;
use App\Models\Event;

class FrontendController extends Controller
{
    public function index(){

        $tentor = Tentor::all();
        $kelas = Kelas::all();
        $event = Event::all();

        return view('frontend.index', compact(
            'tentor','kelas','event'
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

    public function event(){
        
        $event = Event::all();

        return view('frontend.event', compact(
            'event'
        ));
    }
    
    public function eventDetail($id){
        
        $event = Event::find($id);

        return view('frontend.eventdetail', compact(
            'event'
        ));
    }
}
