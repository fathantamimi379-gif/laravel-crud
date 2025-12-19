@extends('layouts.master')

@section('content')
            <h1>Edit data siswa</h1>
          @if(session('sukses'))
          <div class="alert alert-success" role="alert">
                 {{ session('sukses') }}
              </div>
          @endif
            <div class="row">
                <div class="col-lg-12">
    <div class="modal-body">
        <form action="/siswa/{{ $siswa->id }}/update" method="POST">
            {{ csrf_field() }}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
        <input name="nama_depan" value="{{ $siswa->nama_depan }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
        <input name="nama_belakang" value="{{ $siswa->nama_belakang }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
        <option selected>Pilih Jenis Kelamin</option>
        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
        <option value="P"@if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
    </select>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Agama</label>
        <input name="agama" value="{{ $siswa->agama }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="form-floating">
        <textarea name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $siswa->alamat }}</textarea>
        <label for="floatingTextarea2">Alamat</label>
    </div>
    <button type="submit" class="btn btn-warning">Updatae</button>
                </form>
                </div>
            </div>
       @endsection 