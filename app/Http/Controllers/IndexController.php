<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Panitia;
use App\Models\Bidang;

class IndexController extends Controller
{
    public function Index(){
        $timelines = Timeline::orderBy('tanggal_pelaksanaan', 'ASC')->get();
        return view('frontend.pages.index', compact('timelines'));
    }
    public function Struktur(){
        $timelines = Timeline::orderBy('tanggal_pelaksanaan', 'ASC')->get();
        return view('frontend.pages.struktur', compact('timelines'));
    }
    public function Panitia(){
        $panitia = Panitia::orderBy('id', 'ASC')->get();
        $bidang = Bidang::orderBy('prioritas', 'ASC')->get();
        return view('frontend.pages.panitia', compact('panitia', 'bidang'));
    }
    public function Filosofi(){
        $panitia = Panitia::orderBy('id', 'ASC')->get();
        $bidang = Bidang::orderBy('prioritas', 'ASC')->get();
        return view('frontend.pages.filosofi', compact('panitia', 'bidang'));
    }
    public function Media(){
        $panitia = Panitia::orderBy('id', 'ASC')->get();
        $bidang = Bidang::orderBy('prioritas', 'ASC')->get();
        return view('frontend.pages.media', compact('panitia', 'bidang'));
    }
    public function PanitiaView($id){
        $panitia = Panitia::with('bidang', 'sub_bidang')->where('bidang_id', $id)->get();
        return json_encode($panitia);
    }
    
}
