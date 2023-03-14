<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Timeline;
use App\Models\SosialMedia;
use Hash;
use Auth;
use Image;


class AdminController extends Controller
{
    public function Login(){
        return view('admin.login');
    }
    public function Dashboard(){
        $sosmed = SosialMedia::orderBy('id', 'ASC')->get();

        return view('admin.index', compact('sosmed'));
    }
    public function DeleteSosmed($id){
        $sosmed= SosialMedia::findOrFail($id);
        $sosmed_image = $sosmed->logo;
        $sosmed_image= explode('/', $sosmed_image, 2);
        $sosmed_image= $sosmed_image[1];
        unlink($sosmed_image);
        SosialMedia::findOrFail($id)->delete();

        $notification = [
            'message'=>'Event sukses dihapus',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function StoreLogin(Request $request){
        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 
        'password'=>$check['password']])){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('error', 'Invalid Email or Password');
        }
    }
    public function Logout(){
        // Session::flush();
        
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function Timeline(){
        $timelines = Timeline::orderBy('tanggal_pelaksanaan', 'ASC')->get();
        return view('admin.timeline.index', compact('timelines'));
    }
    public function StoreTimeline(Request $request){
        $request->validate([
            'nama_event'=>'required',
            'tanggal_pelaksanaan'=>'required',
        ],
        [
            'nama_event.required'=>'Input nama event',
            'tanggal_pelaksanaan.required'=>'Input tanggal pelaksanaan',
        ]);

        Timeline::insert([
            'nama_event'=>$request->nama_event,
            'tanggal_pelaksanaan'=>$request->tanggal_pelaksanaan,
        ]);

        $notification = [
            'message'=>'Event sukses dibuat',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function EditTimeline($id){
        $timeline = Timeline::where('id', $id)->first();
        return view('admin.timeline.edit', compact('timeline'));
    }
    public function UpdateTimeline(Request $request, $id){
         Timeline::findOrFail($id)->update([
            'nama_event'=>$request->nama_event,
            'tanggal_pelaksanaan'=>$request->tanggal_pelaksanaan,
        ]);

        $notification = [
            'message'=>'Event sukses diupdate',
            'alert-type'=>'success'
        ];
        return redirect()->route('admin.timeline')->with($notification);
    }
    public function TimelineDelete($id){
        Timeline::findOrFail($id)->delete();
        $notification = [
            'message'=>'Event sukses dihapus',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
     public function StoreSosmed(Request $request){
        $request->validate([
            'nama_sosmed'=>'required',
            'logo'=>'required',
            'link'=>'required',
        ],
        [
            'nama_sosmed.required'=>'Input nama sosmed',
            'logo.required'=>'Input logo',
            'link.required'=>'Input link',
        ]);

        
        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/sosmed/'.$name_gen);
        $save_url = '/upload/sosmed/'.$name_gen;

        SosialMedia::insert([
            'nama_sosmed'=>$request->nama_sosmed,
            'logo'=>$save_url,
            'link'=>$request->link,
        ]);

        $notification = [
            'message'=>'Sosial Media Sukses Dibuat',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
    
}
