@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title">Data Siswa</h1>
                            <div class="right">
                                <button type="button" class="btn"data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('sukses') }}
                                </div>
                            @endif

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA DEPAN</th>
                                        <th>NAMA BELAKANG</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_siswa as $siswa)
                                    <tr>
                                        <td><a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_depan }}</a></td>
                                        <td><a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_belakang }}</a></td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>
                                            <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">edit</a>
                                            <a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
                        <label for="nama_depan">Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control" id="nama_depan" placeholder="Nama Depan" value="{{ old('nama_depan') }}">
                        @if($errors->has('nama_depan'))
                            <span class="help-block">{{ $errors->first('nama_depan') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control" placeholder="Nama Belakang">
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L" {{ (old('jenis_kelamin') == 'L') ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="P" {{ (old('jenis_kelamin') == 'P') ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @if($errors->has('jenis_kelamin'))
                            <span class="help blok">{{ $errors->first('jenis_kelamin') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('agama') ? 'has error' : '' }}">
                        <label for="agama">Agama</label>
                        <input name="agama" type="text" class="form-control" id="agama" placeholder="Agama" value="{{ old('agama') }}">
                        @if($errors->has('agama'))
                            <span class="help blok">{{ $errors->first('agama') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group{{ $errors->has('avatar') ? 'has error' : '' }}">
                        <label for="avatar">Avatar</label>
                        <<input name="avatar" type="file" class="form-control" id="avatar" placeholder="Avatar" value="{{ old('avatar') }}">
                         @if($errors->has('avatar'))
                            <span class="help blok">{{ $errors->first('avatar') }}</span>
                        @endif           
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop