<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasPerkuliahan;
use App\Models\HasilVerifikasi;
use App\Models\User;
use App\Models\KategoriBerkas;
use App\Models\Matakuliah;
use App\Models\BerkasDokumen;
use App\Models\Monitoring;
use Carbon\Carbon;
use Auth;

class KelasPerkuliahanController extends Controller
{
    // jurusan
    
    public function index(){
        $dosen = User::get();
        $matakuliah = Matakuliah::with('prodi')->get();
        return view('Ketua_Jurusan.Perkuliahan.index',compact('matakuliah','dosen'));
    }
    // ->with('dosen_verifikator','kelas_perkuliahan.matakuliah','kelas_perkuliahan.dosen_pengampu')
    public function data(){
        $KelasPerkuliahan = HasilVerifikasi::distinct('id_kelas_perkuliahan')->with('dosen_verifikator','kelas_perkuliahan.matakuliah','kelas_perkuliahan.dosen_pengampu')->get(['id_kelas_perkuliahan','id_dosen_verifikator']);
        return response()->json(['data' => $KelasPerkuliahan]);
    }

    public function create(Request $request){
        $data = KelasPerkuliahan::orderBy('id', 'DESC')->first();
        $id;

        if($data == null){
            $id = "K0001";
        }else{
            $newId = substr($data->id, 1,4);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id = "K000" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "K00" .$tambah;
            }else if (strlen($tambah) == 3){
                $id = "K0" .$tambah;
            }else if (strlen($tambah) == 4){
                $id = "K" .$tambah;
            }
        }
        
        KelasPerkuliahan::create([
            'id' => $id,
            'id_dosen_pengampu' => $request->dosen_pengampu,
            'id_matakuliah' => $request->matakuliah,
            'keterangan' => null,
            'tahun_akademik' => $request->tahun_akademik,
            'kurikulum' => $request->kurikulum,
            'status' => 1,
        ]);

        $now = Carbon::now();

        $data1 = HasilVerifikasi::orderBy('id', 'DESC')->first();
        $id1;

        if($data1 == null){
            $id1 = "V000000001";
        }else{
            $newId = substr($data1->id, 1,9);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id1 = "V00000000" .$tambah;
            }else if (strlen($tambah) == 2){
                $id1 = "V0000000" .$tambah;
            }else if (strlen($tambah) == 3){
                $id1 = "V000000" .$tambah;
            }else if (strlen($tambah) == 4){
                $id1 = "V00000" .$tambah;
            }else if (strlen($tambah) == 5){
                $id1 = "V0000" .$tambah;
            }else if (strlen($tambah) == 6){
                $id1 = "V000" .$tambah;
            }else if (strlen($tambah) == 7){
                $id1 = "V00" .$tambah;
            }else if (strlen($tambah) == 8){
                $id1 = "V0" .$tambah;
            }else if (strlen($tambah) == 9){
                $id1 = "V" .$tambah;
            }
        }


        HasilVerifikasi::create([
            'id' => $id1,
            'id_dosen_verifikator' => $request->dosen_verifikator,
            'id_kelas_perkuliahan' => $id,
            'timeline_perkuliahan' => 1,
            'status' => 1,
            'tanggal_verifikasi' => null,
            'tanda_tangan_verifikator' => null,
            'tanda_tangan_gkm' => null,
            'catatan' => null,
        ]);

        return redirect()->route('jurusan.kelas_perkuliahan')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $KelasPerkuliahan = KelasPerkuliahan::where('id',$id)->get();
        return $KelasPerkuliahan->toJson();
    }

    public function update(Request $request, $id){
        $KelasPerkuliahan = KelasPerkuliahan::where('id', $id)->first();

        $KelasPerkuliahan->kurikulum  = $request->kurikulum;
        $KelasPerkuliahan->id_dosen_pengampu  = $request->dosen_pengampu;
        $KelasPerkuliahan->tahun_akademik  = $request->tahun_akademik;
        
        $KelasPerkuliahan->save();

        HasilVerifikasi::where('id_kelas_perkuliahan',$id)->update([
            'id_dosen_verifikator' => $request->dosen_verifikator,
        ]);

        return redirect()->route('jurusan.kelas_perkuliahan')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        KelasPerkuliahan::where('id',$id)->delete();
    }

    // end jurusan

    // Dosen

    public function dosen_index(){
        return view('Dosen.Perkuliahan.index');
    }

    public function dosen_data(){
        $id = auth()->user()->nip;
        $KelasPerkuliahan = KelasPerkuliahan::where('id_dosen_pengampu',$id)->Where('status',1)->with('matakuliah')->get();
        return response()->json(['data' => $KelasPerkuliahan]);
    }

    public function dosen_detail($id){
        $kelas = KelasPerkuliahan::where('id',$id)->first();
        $kategori = KategoriBerkas::whereNotIn('kategori',[1])->get();
        $berkas = BerkasDokumen::where('id_kelas_perkuliahan',$id)->with('kategori_berkas')->get();
        return view('Dosen.Perkuliahan.detail', compact('kelas','kategori','berkas'));
    }

    // End Dosen

}
