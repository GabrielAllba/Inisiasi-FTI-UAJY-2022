@extends('admin.admin_master')
@section('title')
    Admin Panel Dashboard
@endsection
@section('content')

<h4 style="color: black;">
  Kelompok
</h4>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Data Mahasiswa</button>
            </form>
            <a style="margin: 1rem 0" class="btn btn-warning float-end" href="{{ route('users.export') }}">Export Data Mahasiswa</a>
            <table id="table_id" class="display table_bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>NPM</th>
                        <th>KELOMPOK</th>
                        <th>STATUS LULUS</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->npm}}</td>
                        <td>{{$item->kelompok}}</td>
                        <td>{{$item->status_lulus}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                $(document).ready( function () {
                    $('#table_id').DataTable();
                } );
            </script>
        </div>
    </div>
</div>

    
    @endsection
    
    