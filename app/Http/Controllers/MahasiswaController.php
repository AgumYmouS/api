<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
      return Mahasiswa::all();
    }

    public function create(request $request)
    {
      $maha = new Mahasiswa;
      $maha->nama = $request->nama;
      $maha->nim = $request->nim;
      $maha->tanggal = $request->tanggal;
      $maha->matakuliah = $request->matakuliah;
      $maha->foto = $request->foto;
      $maha->save();

      return "Data Masuk";
    }

    public function delete($id)
    {
      $maha = Mahasiswa::find($id);
      $maha->delete();

      return "Data Dihapus";
    }

    public function serachByDateAndMk(Request $request)
    {
      $tgl = $request->tgl;
      $mk = $request->mk;

      $mhs = Mahasiswa::where(['tanggal' => $tgl, 'matakuliah' => $mk])->get();

      return $mhs;
    }
}
