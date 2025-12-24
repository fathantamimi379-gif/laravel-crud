@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title">Program Agenda Kegiatan</h1>
                            <h1 class="panel-title">PPK Perencanaan dan Program BWS Kalimantan | Pontianak</h1>
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
            <form action="/siswa/create" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control" placeholder="Nama Depan">
                    </div>
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control" placeholder="Nama Belakang">
                    </div>
                    <div class="form-group">
                        <label>Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input name="agama" type="text" class="form-control" placeholder="Agama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"></textarea>
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