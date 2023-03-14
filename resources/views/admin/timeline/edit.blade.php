@extends('admin.admin_master')
@section('title')
    Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
  Timeline
</h4>


<div class="row" style="margin-top: 1rem">
    <div class="container">

        <div class="col-md-4">
            <form class="card p-3" method="POST" action="{{route('admin.timeline.update', $timeline->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" value="{{$timeline->tanggal_pelaksanaan}}" name="tanggal_pelaksanaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('tanggal_pelaksanaan')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama event</label>
                    <input type="text" value="{{$timeline->nama_event}}" name="nama_event" class="form-control" id="exampleInputPassword1" placeholder="Nama event">
                    @error('nama_event')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
    
    
    @endsection
    
    