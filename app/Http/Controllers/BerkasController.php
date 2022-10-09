<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerkas;
use App\Models\JenisKelengkapanDokumen;
use App\Models\BerkasDokumen;
use App\Models\DetailHasilVerifikator;
use App\Models\HasilVerifikasi;
use App\Models\Monitoring;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use DB;
use PDF;

class BerkasController extends Controller
{
    // Kategori Berkas Master
    
    public function index(){
        return view('Ketua_Jurusan.master.kategori_berkas');
    }

    public function data(){
        $kategoriberkas = KategoriBerkas::get();
        return response()->json(['data' => $kategoriberkas]);
    }

    public function create(Request $request){
        $data = KategoriBerkas::orderBy('id', 'DESC')->first();
        $id;

        if($data == null){
            $id = "B01";
        }else{
            $newId = substr($data->id, 2,1);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id = "B0" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "B" .$tambah;
            }
        }
        
        KategoriBerkas::create([
            'id' => $id,
            'nama_berkas' => $request->nama_berkas,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('jurusan.kategori_berkas')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $kategoriberkas = KategoriBerkas::where('id',$id)->get();
        return $kategoriberkas->toJson();
    }

    public function update(Request $request, $id){
        $kategoriberkas = KategoriBerkas::where('id', $id)->first();

        $kategoriberkas->nama_berkas  = $request->nama_berkas;
        $kategoriberkas->kategori  = $request->kategori;

        $kategoriberkas->save();

        return redirect()->route('jurusan.kategori_berkas')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        KategoriBerkas::where('id',$id)->delete();
    }

    // End Kategori Berkas Master

    // Kategori Penilaian Master
    
    public function penilaian_index(){
        return view('Ketua_Jurusan.master.penilaian');
    }

    public function penilaian_data(){
        $JenisKelengkapanDokumen = JenisKelengkapanDokumen::get();
        return response()->json(['data' => $JenisKelengkapanDokumen]);
    }

    public function penilaian_create(Request $request){
        $data = JenisKelengkapanDokumen::orderBy('id', 'DESC')->first();
        $id;

        if($data == null){
            $id = "P01";
        }else{
            $newId = substr($data->id, 1,2);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id = "P0" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "P" .$tambah;
            }
        }
        
        JenisKelengkapanDokumen::create([
            'id' => $id,
            'kelengkapan_dokumen' => $request->kelengkapan_dokumen,
            'tipe_penilaian' => $request->tipe_penilaian,
        ]);

        return redirect()->route('jurusan.kategori_penilaian')->with('success', 'Data Berhasil Di Simpan');
    }

    public function penilaian_edit($id){

        $JenisKelengkapanDokumen = JenisKelengkapanDokumen::where('id',$id)->get();

        return $JenisKelengkapanDokumen->toJson();
    }

    public function penilaian_update(Request $request, $id){
        $JenisKelengkapanDokumen = JenisKelengkapanDokumen::where('id', $id)->first();

        $JenisKelengkapanDokumen->kelengkapan_dokumen  = $request->kelengkapan_dokumen;
        $JenisKelengkapanDokumen->tipe_penilaian  = $request->tipe_penilaian;

        $JenisKelengkapanDokumen->save();

        return redirect()->route('jurusan.kategori_penilaian')->with('success', 'Data Berhasil Di Ubah');
    }

    public function penilaian_delete($id){
        JenisKelengkapanDokumen::where('id',$id)->delete();
    }

    // End Kategori Penilaian Master

    // Dosen Pengampu

    public function upload_berkas(Request $request, $id){
        $now = Carbon::now();
        if($id == 1){
            $file1 = $request->file('rps');
            $file2 = $request->file('rtm');
            $file3 = $request->file('kontrak');
            $file4 = $request->file('bap');
            if ($file1 != null){
                if ($file1->isValid()) {
                    $path = $file1->store('public/dokumen');
                    BerkasDokumen::create([
                        'id_kelas_perkuliahan' => $request->id_kelas,
                        'id_kategori_berkas' => $request->kategori_rps,
                        'file_berkas' => $path,
                        'tanggal_upload' => $now,
                        'status' => 1,
                        'keterangan' => "",
                    ]);
                }
            }

            if ($file2 != null){
                if ($file2->isValid()) {
                    $path = $file2->store('public/dokumen');
                    BerkasDokumen::create([
                        'id_kelas_perkuliahan' => $request->id_kelas,
                        'id_kategori_berkas' => $request->kategori_rtm,
                        'file_berkas' => $path,
                        'tanggal_upload' => $now,
                        'status' => 1,
                        'keterangan' => "",
                    ]);
                }
            }

            if ($file3 != null){
                if ($file3->isValid()) {
                    $path = $file3->store('public/dokumen');
                    BerkasDokumen::create([
                        'id_kelas_perkuliahan' => $request->id_kelas,
                        'id_kategori_berkas' => $request->kategori_kontrak,
                        'file_berkas' => $path,
                        'tanggal_upload' => $now,
                        'status' => 1,
                        'keterangan' => "",
                    ]);
                }
            }

            if ($file4 != null){
                if ($file4->isValid()) {
                    $path = $file4->store('public/dokumen');
                    BerkasDokumen::create([
                        'id_kelas_perkuliahan' => $request->id_kelas,
                        'id_kategori_berkas' => $request->kategori_bap,
                        'file_berkas' => $path,
                        'tanggal_upload' => $now,
                        'status' => 1,
                        'keterangan' => "",
                    ]);
                }
            }
        }else{
            $data = HasilVerifikasi::where('id_kelas_perkuliahan',$request->id_kelas1)->first();
            
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
            
            $kategori;

            if($request->id_kategori == "B05"){
                $kategori = 2;
            }else{
                $kategori = 3;
            }

            HasilVerifikasi::create([
                'id' => $id1,
                'id_dosen_verifikator' => $data->id_dosen_verifikator,
                'id_kelas_perkuliahan' => $request->id_kelas1,
                'timeline_perkuliahan' => $kategori,
                'status' => 1,
                'tanggal_verifikasi' => null,
                'tanda_tangan_verifikator' => null,
                'tanda_tangan_gkm' => null,
                'catatan' => null,
            ]);

            $file = $request->file('berkas');
            if ($file != null){
                if ($file->isValid()) {
                    $path = $file->store('public/dokumen');
                    BerkasDokumen::create([
                        'id_kelas_perkuliahan' => $request->id_kelas1,
                        'id_kategori_berkas' => $request->id_kategori,
                        'file_berkas' => $path,
                        'tanggal_upload' => $now,
                        'status' => 1,
                        'keterangan' => "",
                    ]);
                }
            }
        }

        return redirect()->route('dosen.kelas-perkuliahan')->with('success', 'Data Berhasil Di Ubah');
    }

    public function edit_berkas($id, $id1){
        $BerkasDokumen = BerkasDokumen::where([['id_kelas_perkuliahan',$id1],['id_kategori_berkas', $id]])->get();
        return $BerkasDokumen->toJson();
    }

    public function update_berkas(Request $request, $id){
        $now = Carbon::now();
        $file = $request->file('berkas');
            if ($file != null){
                if ($file->isValid()) {
                    $path = $file->store('public/dokumen');
                    BerkasDokumen::where([['id_kelas_perkuliahan',$id],['id_kategori_berkas', $request->kategori_berkas]])->update([
                        'file_berkas' => $path,
                        'tanggal_upload' => $now,
                        'status' => 1,
                        'keterangan' => "",
                    ]);
                }
            }

        return redirect()->route('dosen.kelas-perkuliahan')->with('success', 'Data Berhasil Di Ubah');
    }

    // End Dosen Pengampu

    // Check Berkas

    public function pdf($id, $id1){
        $file = BerkasDokumen::where([['id_kelas_perkuliahan',$id1],['id_kategori_berkas',$id]])->first();

        $path = storage_path('app/'. $file->file_berkas);
        
        return response()->file($path);
    }

    public function bukti($id){
        $file = Monitoring::where('id',$id)->first();

        $path = storage_path('app/'. $file->bukti);
        
        return response()->file($path);
    }

    public function kelengkapan_dokumen($id){
        $data = DB::table('hasilverifikasis')->where('hasilverifikasis.id','=',$id)
        ->join('kelasperkuliahans','kelasperkuliahans.id','=','hasilverifikasis.id_kelas_perkuliahan')
        ->join('matakuliahs','matakuliahs.id','=','kelasperkuliahans.id_matakuliah')
        ->join('users','users.nip','=','kelasperkuliahans.id_dosen_pengampu')->get();

        $data1 = DetailHasilVerifikator::where('id_hasil_verifikasi', $id)->with('jenis_kelengkapan_berkas','hasil_verifikasi.dosen_verifikator')->get();

        $gkm = User::where('status',2)->first();

        $ttd = HasilVerifikasi::where('id',$id)->first();

        $berkas = BerkasDokumen::where('id_kelas_perkuliahan',$ttd->id_kelas_perkuliahan)->with('kategori_berkas')->get();
        
        $pdf = PDF::loadView('Berkas.kelengkapan_berkas', compact('data','data1','gkm','ttd','berkas'))->setPaper('a4', 'potrait');
        
        return $pdf->stream();
        // return view('Berkas.kelengkapan_berkas', compact('data','data1','gkm','ttd'));
    }

    public function soal_uts($id){
        $data = DB::table('hasilverifikasis')->where('hasilverifikasis.id','=',$id)
        ->join('kelasperkuliahans','kelasperkuliahans.id','=','hasilverifikasis.id_kelas_perkuliahan')
        ->join('matakuliahs','matakuliahs.id','=','kelasperkuliahans.id_matakuliah')
        ->join('users','users.nip','=','kelasperkuliahans.id_dosen_pengampu')->get();

        $data1 = DetailHasilVerifikator::where('id_hasil_verifikasi', $id)->with('jenis_kelengkapan_berkas','hasil_verifikasi.dosen_verifikator')->get();

        $gkm = User::where('status',2)->first();

        $ttd = HasilVerifikasi::where('id',$id)->first();

        $berkas = BerkasDokumen::where('id_kelas_perkuliahan',$ttd->id_kelas_perkuliahan)->with('kategori_berkas')->get();
        
        $pdf = PDF::loadView('Berkas.soal_uts', compact('data','data1','gkm','ttd','berkas'))->setPaper('a4', 'potrait');
        
        return $pdf->stream();
    }

    public function soal_uas($id){
        
    }
}
