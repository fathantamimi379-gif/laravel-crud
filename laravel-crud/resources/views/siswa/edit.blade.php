@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title">Edit Data Siswa</h1>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input name="nama_depan" type="text" class="form-control" id="nama_depan" placeholder="Nama Depan" value="{{$siswa->nama_depan}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input name="agama" type="text" class="form-control" id="agama" placeholder="Agama" value="{{$siswa->agama}}">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Alamat Lengkap">{{$siswa->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Avatar</label>
                                    <input type="file" name="avatar">
                                    
                                </div>
                                
                                <br>
                                <div class="text-right">
                                    <a href="/siswa" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@stop