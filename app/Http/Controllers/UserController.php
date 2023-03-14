<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\MahasiswaBaru;
use App\Models\User;
  
class UserController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $users = MahasiswaBaru::get();
  
        return view('admin.kelompok.kelompok', compact('users'));
    }
        
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        $mah = MahasiswaBaru::get()->count();
        if($mah==0){
            return back();
        }
        return Excel::download(new UsersExport, 'users.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        if(request()->file('file')==null){
            return back();
        }
        Excel::import(new UsersImport,request()->file('file'));
               
        return back();
    }
}