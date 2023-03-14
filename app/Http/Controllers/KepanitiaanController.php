<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Admin;
use App\Models\SubBidang;
use App\Models\Panitia;
use Image;
use Hash;


class KepanitiaanController extends Controller
{
    public function Bidang(){
        $bidang = Bidang::orderBy('id', 'DESC')->get();
        return view('admin.panitia.bidang', compact('bidang'));
    }
    public function StoreBidang(Request $request){
         $request->validate([
            'nama_bidang'=>'required',
            'logo_bidang'=>'required',
        ],
        [
            'nama_bidang.required'=>'Input nama bidang',
            'logo_bidang.required'=>'Input logo bidang',
        ]);

        $image = $request->file('logo_bidang');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/panitia/'.$name_gen);
        $save_url = '/upload/panitia/'.$name_gen;

        Bidang::insert([
            'nama_bidang'=>$request->nama_bidang,
            'logo_bidang'=>$save_url,
            'prioritas'=>$request->prioritas,
        ]);

        $notification = [
            'message'=>'Bidang sukses dibuat',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function KelolaPanitia(){
        // Admin::insert([
        //   'name'=>'panitia',
        //   'email'=>'inisiasi@gmail.com',
        //   'password'=>Hash::make('inisiasi')
        // ]);
        $bidang = Bidang::orderBy('prioritas', 'ASC')->get();
        return view('admin.panitia.index', compact('bidang'));
    }
    public function EditBidang($id){
        $bidang = Bidang::where('id', $id)->get();
        return view('admin.panitia.edit_bidang', compact('bidang'));
    }
    public function UpdateBidang(Request $request, $id){
        $old_img = $request->old_brand_image;
        $old_img = explode('/', $old_img, 2);
        $old_img = $old_img[1];

        if($request->file('logo_bidang')){
            unlink($old_img);

            
            $image = $request->file('logo_bidang');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/panitia/'.$name_gen);
            $save_url = '/upload/panitia/'.$name_gen;

            Bidang::findOrFail($id)->update([
                'nama_bidang'=>$request->nama_bidang,
                'logo_bidang'=>$save_url,
                'prioritas'=>$request->prioritas
            ]);

            $notification = [
                'message'=>'Bidang berhasil diupdate!',
                'alert-type'=>'success'
            ];
            return redirect()->route('admin.bidang')->with($notification);

        }else{

            Bidang::findOrFail($id)->update([
                'nama_bidang'=>$request->nama_bidang,
                'prioritas'=>$request->prioritas,
            ]);

            $notification = [
                'message'=>'Bidang berhasil diupdate!',
                'alert-type'=>'success'
            ];
            return redirect()->route('admin.bidang')->with($notification);

        }
        return redirect()->route('admin.bidang')->with($notification);
    }

    public function DeleteBidang($id){

        $bidang= Bidang::findOrFail($id);
        $bidang_image = $bidang->logo_bidang;
        $bidang_image = explode('/', $bidang_image, 2);
        $bidang_image = $bidang_image[1];
        unlink($bidang_image);
        Bidang::findOrFail($id)->delete();

        $notification = [
            'message'=>'bidang deleted successfully',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }

    // sub bidang
    public function SubBidang(){
        $bidang = Bidang::orderBy('id', 'DESC')->get();
        return view('admin.panitia.sub_bidang', compact('bidang'));
    }
    public function StoreSubBidang(Request $request){
         $request->validate([
            'nama_sub_bidang'=>'required',
            'bidang_id'=>'required',
            'prioritas'=>'required',
        ],
        [
            'nama_sub_bidang.required'=>'Input nama sub bidang',
            'bidang_id.required'=>'Pilih nama bidang',
            'prioritas.required'=>'Tentukan Prioritas',
        ]);

        SubBidang::insert([
            'bidang_id'=>$request->bidang_id,
            'nama_sub_bidang'=>$request->nama_sub_bidang,
            'prioritas'=>$request->prioritas
        ]);

        $notification = [
            'message'=>'Sub Bidang berhasil diinput!',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
     public function DeleteSubBidang($id){
        SubBidang::findOrFail($id)->delete();

        $notification = [
            'message'=>'bidang deleted successfully',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }

    // panitia
    public function StorePanitia(Request $request){
        $request->validate([
            'sub_bidang_id'=>'required',
            'bidang_id'=>'required',
            'nama'=>'required',
            'foto'=>'required',
            // 'foto'=>'required',
        ],
        [
            'sub_bidang_id.required'=>'Input sub bidang',
            'bidang_id.required'=>'Input bidang',
            'nama.required'=>'Input nama',
            'foto.required'=>'Input foto',
        ]);

        $image = $request->file('foto');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/panitia/'.$name_gen);
        $save_url = '/upload/panitia/'.$name_gen;
        
        Panitia::insert([
            'bidang_id'=>$request->bidang_id,
            'sub_bidang_id'=>$request->sub_bidang_id,
            'nama'=>$request->nama,
            'foto'=>$save_url,
        ]);

        $notification = [
            'message'=>'Berhasil Input Data!',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function PanitiaEdit($id){
        $bidang = Bidang::orderBy('id', 'DESC')->get();
        $panitia = Panitia::findOrFail($id);
        return view('admin.panitia.edit', compact('panitia', 'bidang'));
    }
    public function PanitiaHapus(Request $request, $id){
        $panitia= Panitia::findOrFail($id);
        $panitia_image = $panitia->foto;
        $panitia_image = explode('/', $panitia_image, 2);
        $panitia_image = $panitia_image[1];
        unlink($panitia_image);
        Panitia::findOrFail($id)->delete();
        $notification = [
            'message'=>'Panitia deleted successfully',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
}
