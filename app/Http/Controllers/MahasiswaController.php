<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
      return response()->json(['data' => Mahasiswa::all()], 200);
    }

    public function create(Request $request)
    {
      // dd ($request);
      $maha = new Mahasiswa;
      $maha->nama = $request->nama;
      $maha->nim = $request->nim;
      $maha->tanggal = $request->tanggal;
      $maha->matakuliah = $request->matakuliah;
      if($request->file('foto')){
        $name = time().'.'.$request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->storeAs('public', $name);
        $maha->foto = $name;
      }
      $maha->fav = $request->fav;
      $maha->save();

      return response()->json([
        'message' => 'Data masuk'
      ], 201);
    }

    public function update(Request $request, $id){
      $maha = Mahasiswa::findOrFail($id);

      $maha->fav = $request->input('fav');
      $maha->save();

      return response()->json([
        'message' => 'Data diupdate'
      ], 202);
    }

    public function delete($id)
    {
      $maha = Mahasiswa::find($id);
      $maha->delete();

      return response()->json([
        'message' => 'Data dihapus'
      ], 202);
    }

    public function serachByDateAndMk(Request $request)
    {
      $tgl = $request->tgl;
      $mk = $request->mk;

      $mhs = Mahasiswa::where(['tanggal' => $tgl, 'matakuliah' => $mk])->get();

      return response()->json($mhs, 200);
    }
}
