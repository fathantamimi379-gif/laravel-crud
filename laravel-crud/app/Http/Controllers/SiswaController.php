<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        \App\Models\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses','Data added successfully');
    }

    public function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request,$id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data berhasil di update');
    }

    public function delete($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data berhasil di hapus');
    }

    public function profile($id)
    {
    $siswa = \App\Models\Siswa::find($id);

    return view('siswa.profile', ['siswa' => $siswa]);
    }
}
