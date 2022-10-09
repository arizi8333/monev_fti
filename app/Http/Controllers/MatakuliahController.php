<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Prodi;

class MatakuliahController extends Controller
{
    // Jurusan
    public function index(){
        $data = Prodi::all();
        return view('Ketua_Jurusan.master.matakuliah', compact('data'));
    }

    public function data(){
        $matakuliah = Matakuliah::with('prodi')->get();
        return response()->json(['data' => $matakuliah]);
    }

    public function create(Request $request){
        $data = Matakuliah::orderBy('id', 'DESC')->first();
        $id;

        if($data == null){
            $id = "M0001";
        }else{
            $newId = substr($data->id, 2,4);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id = "M000" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "M00" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "M0" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "M" .$tambah;
            }
        }
        
        Matakuliah::create([
            'id' => $id,
            'id_prodi' => $request->prodi,
            'nama_matakuliah' => $request->matakuliah,
            'kategori_matakuliah' => $request->kategori,
            'kuota' => $request->kuota,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('jurusan.matakuliah')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $matakuliah = Matakuliah::where('id',$id)->get();
        return $matakuliah->toJson();
    }

    public function update(Request $request, $id){
        $matakuliah = Matakuliah::where('id', $id)->first();

        $matakuliah->id_prodi  = $request->prodi;
        $matakuliah->nama_matakuliah  = $request->matakuliah;
        $matakuliah->kategori_matakuliah  = $request->kategori;
        $matakuliah->kuota  = $request->kuota;
        $matakuliah->sks  = $request->sks;
        $matakuliah->semester  = $request->semester;

        $matakuliah->save();

        return redirect()->route('jurusan.matakuliah')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        Matakuliah::where('id',$id)->delete();
    }
    // End Jurusan
}
