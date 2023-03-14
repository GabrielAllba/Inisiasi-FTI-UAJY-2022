@extends('admin.admin_master')
@section('title')
    Admin | Inisiasi FTI UAJY 2022
@endsection
@section('content')

<h4 style="color: black;">
  Kepanitiaan
</h4>
@foreach ($bidang as $item)
    @php
        $sub_bidang = App\Models\SubBidang::where('bidang_id', $item->id)->get();
        $panitia = App\Models\Panitia::where('bidang_id', $item->id)->orderBy('sub_bidang_id','ASC')->get();
    @endphp
<h5 style="padding-top: 2rem">
    {{$item->nama_bidang}}
</h5>
<div class="row">
        <div class="col-md-8 card p-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bidang</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($panitia as $pnt)
                        
                    <tr>
                        <td>
                            <img style="max-width: 5rem" src="{{asset($pnt->foto)}}" alt="">
                        </td>
                        <td class="align-middle">{{$pnt->nama}}</td>
                        <td class="align-middle">{{$pnt['bidang']['nama_bidang']}}</td>
                        <td class="align-middle">{{$pnt['sub_bidang']['nama_sub_bidang']}}</td>
                        <td class="align-middle">
                            <a href="{{route('panitia.edit', $pnt->id)}}">Edit</a> |
                            <a href="{{route('panitia.hapus', $pnt->id)}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
          </table>
        </div>
          <div class="col-md-4">
            <form class="card p-3" method="POST" action="{{route('admin.list_panitia.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="form-control" name="bidang_id" id="">
                        <option selected value="{{$item->id}}">{{$item->nama_bidang}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="sub_bidang_id" id="">
                        <option selected disabled value="">Pilih Sub Menu Bidang</option>
                        @foreach ($sub_bidang as $sb)
                        @if (count($sub_bidang)==1)
                        <option selected value="{{$sb->id}}">{{$sb->nama_sub_bidang}}</option>
                        @else
                        <option value="{{$sb->id}}">{{$sb->nama_sub_bidang}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama">
                    @error('nama')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Foto</label>
                    <input type="file" name="foto" class="form-control" id="exampleInputPassword1" placeholder="Nama event">
                    @error('nama_event')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
   

</div>

@endforeach

    
    @endsection
    
    