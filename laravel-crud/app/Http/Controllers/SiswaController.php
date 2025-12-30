<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = \App\Models\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa = \App\Models\Siswa::all();
        }
        return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        // 1. Validasi Data
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpeg,png',
        ]);

        // 2. Insert ke table User (Enkripsi password dan simpan)
        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan; // Memastikan menggunakan 'name'
        $user->email = $request->email;
        $user->password = bcrypt('rahasia'); // Wajib Bcrypt agar bisa login
        $user->remember_token = Str::random(60);
        $user->save();

        // 3. Tambahkan user_id ke request untuk tabel Siswa
        $request->request->add(['user_id' => $user->id]);

        // 4. Insert ke table Siswa (Kecuali file avatar)
        $siswa = \App\Models\Siswa::create($request->all());

        // 5. Proses Upload Avatar (Setelah data siswa ada)
        if($request->hasFile('avatar')){
            // Pindahkan file ke folder public/images
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            // Update nama file di database
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('sukses', 'Data added successfully');
    }

    public function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->update($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil di update');
    }

    public function delete($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil di hapus');
    }

    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }
}