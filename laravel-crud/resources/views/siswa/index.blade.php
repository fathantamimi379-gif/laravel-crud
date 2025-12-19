@extends('layouts.master')

@section('content')
      <div class="main">
        <div class="main-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data siswa</h3>
                  <div class="right">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Tambah data siswa
                    </button>
                    <button type="button" class="btn-remove"data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lnr-cross"></i></button>
                  </div>
								</div>
								<div class="panel-body">
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
                              <td>{{ $siswa->nama_depan }}</td>
                              <td>{{ $siswa->nama_belakang }}</td>
                              <td>{{ $siswa->jenis_kelamin }}</td>
                              <td>{{ $siswa->agama }}</td>
                              <td>{{ $siswa->alamat }}</td>
                              <td>
                                <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">edit</a>
                                <a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')">delete</a>
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

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/siswa/create" method="POST">
        {{ csrf_field() }}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
    <option selected>Pilih Jenis Kelamin</option>
    <option value="L">Laki-Laki</option>
    <option value="P">Perempuan</option>
  </select>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Agama</label>
    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-floating">
    <textarea name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
    <label for="floatingTextarea2">Alamat</label>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
@stop
@section('content1')
    
          @if(session('sukses'))
          <div class="alert alert-success" role="alert">
                 {{ session('sukses') }}
              </div>
          @endif
            <div class="row">
                <div class="col-6">
                    <h1>Data Siswa</h1>
                </div>
                <div class="col-6">
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah data siswa
</button>

</div>
</div>
    
    <table class="table table-hover">
    <tr>
        <th>NAMA DEPAN</th>
        <th>NAMA BELAKANG</th>
        <th>JENIS KELAMIN</th>
        <th>AGAMA</th>
        <th>ALAMAT</th>
        <th>AKSI</th>
    </tr>
    @foreach ($data_siswa as $siswa)
    <tr>
        <td>{{ $siswa->nama_depan }}</td>
        <td>{{ $siswa->nama_belakang }}</td>
        <td>{{ $siswa->jenis_kelamin }}</td>
        <td>{{ $siswa->agama }}</td>
        <td>{{ $siswa->alamat }}</td>
        <td>
          <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">edit</a>
          <a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')">delete</a>
        </td>
    </tr>    
    @endforeach
</table>
            </div>
        </div> 
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/siswa/create" method="POST">
        {{ csrf_field() }}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
    <option selected>Pilih Jenis Kelamin</option>
    <option value="L">Laki-Laki</option>
    <option value="P">Perempuan</option>
  </select>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Agama</label>
    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-floating">
    <textarea name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
    <label for="floatingTextarea2">Alamat</label>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
@endsection
    