<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasPerkuliahan;
use App\Models\Monitoring;
use App\Models\HasilVerifikasi;
use App\Models\BerkasDokumen;
use App\Models\JenisKelengkapanDokumen;
use App\Models\DetailHasilVerifikator;
use Carbon\Carbon;
use DB;

class MonitoringController extends Controller
{
    // Dosen

    public function dosen_index($id){
        $data = KelasPerkuliahan::where('id',$id)->with('matakuliah')->get();
        $monitoring = HasilVerifikasi::where([['id_kelas_perkuliahan',$id],['status',2]])->with('monitoring')->get();
        // return $monitoring;
        return view('Dosen.Perkuliahan.detail1', compact('data','monitoring'));
    }

    public function dosen_create(Request $request){
        $file = $request->file('bukti');
            if ($file != null){
                if ($file->isValid()) {
                    $path = $file->store('public/bukti');

                    $data1 = Monitoring::orderBy('id', 'DESC')->first();
                    $id1;

                    if($data1 == null){
                        $id1 = "M000000001";
                    }else{
                        $newId = substr($data1->id, 1,9);
                        $tambah = (int)$newId + 1;
                        if (strlen($tambah) == 1){
                            $id1 = "M00000000" .$tambah;
                        }else if (strlen($tambah) == 2){
                            $id1 = "M0000000" .$tambah;
                        }else if (strlen($tambah) == 3){
                            $id1 = "M000000" .$tambah;
                        }else if (strlen($tambah) == 4){
                            $id1 = "M00000" .$tambah;
                        }else if (strlen($tambah) == 5){
                            $id1 = "M0000" .$tambah;
                        }else if (strlen($tambah) == 6){
                            $id1 = "M000" .$tambah;
                        }else if (strlen($tambah) == 7){
                            $id1 = "M00" .$tambah;
                        }else if (strlen($tambah) == 8){
                            $id1 = "M0" .$tambah;
                        }else if (strlen($tambah) == 9){
                            $id1 = "M" .$tambah;
                        }
                    }

                    Monitoring::create([
                        'id' => $id1,
                        'hasil_verifikasi_id' => $request->hasil_verifikasi,
                        'jumlah_mahasiswa' => $request->jumlah,
                        'tanggal' => $request->tanggal,
                        'materi' => $request->materi,
                        'pertemuan' => $request->pertemuan,
                        'jam_mulai' => $request->jam_mulai,
                        'jam_selesai' => $request->jam_selesai,
                        'bukti' => $path,
                    ]);

                    return redirect()->route('dosen.kelas-perkuliahan')->with('success', 'Data Berhasil Di Simpan');
                }
            }
    }

    // End Dosen

    // Verifikator

    public function verifikator_index(){
        $id = auth()->user()->nip;
        $data = HasilVerifikasi::where([['id_dosen_verifikator',$id],['status',1]])->with('kelas_perkuliahan.matakuliah','kelas_perkuliahan.dosen_pengampu')->get();
        return view('Dosen.Verifikator.index', compact('data'));
    }

    public function verifikator_detail($id){
        $data = HasilVerifikasi::where('id',$id)->first();
        $berkas = BerkasDokumen::join('kategoriberkas','kategoriberkas.id','=','berkasdokumens.id_kategori_berkas')->where([['kategori',$data->timeline_perkuliahan],['id_kelas_perkuliahan',$data->id_kelas_perkuliahan]])
                    ->get();
        if($data->timeline_perkuliahan == 1){
            $kategori = JenisKelengkapanDokumen::where('tipe_penilaian','=','Kelengkapan Dokumen RPS')->get();
        }else{
            $kategori = JenisKelengkapanDokumen::where('tipe_penilaian','!=','Kelengkapan Dokumen RPS')->get();
        }
        // echo $berkas;                    
        return view('Dosen.Verifikator.detail', compact('data','berkas', 'kategori'));
    }

    public function verifikator_update(Request $request){
        BerkasDokumen::where([['id_kategori_berkas',$request->id_kategori_berkas],['id_kelas_perkuliahan',$request->id_kelas_perkuliahan]])->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return back();
    }

    public function verifikator_create(Request $request){
        for($a = 0; $a < sizeof($request->nilai); $a++){
            DetailHasilVerifikator::create([
                'id_hasil_verifikasi' => $request->id_hasil_verifikator,
                'id_jenis_kelengkapan_dokumen' => $request->id_jenis_penilaian[$a],
                'penilaian' => $request->nilai[$a],
                'keterangan' => $request->keterangan[$a],
            ]);
        }

        $now = Carbon::now();

        $file = $request->file('file');
            if ($file != null){
                if ($file->isValid()) {
                    $path = $file->store('public/ttd');
                    HasilVerifikasi::where('id', $request->id_hasil_verifikator)->update([
                        'status' => 2,
                        'tanggal_verifikasi' => $now,
                        'tanda_tangan_verifikator' => $path
                    ]);
                }
            }

        return redirect()->route('verifikator.monev');
    }
    // End Verifikator

    // GKM

    public function gkm_index(){
        $data = HasilVerifikasi::where([['status',2],['tanda_tangan_gkm', null]])->with('dosen_verifikator','kelas_perkuliahan.matakuliah')->get();
        return view('GKM.index', compact('data'));
    }

    public function gkm_detail($id){
        $data = DetailHasilVerifikator::where('id_hasil_verifikasi', $id)->with('hasil_verifikasi.dosen_verifikator','hasil_verifikasi.kelas_perkuliahan.matakuliah','hasil_verifikasi.kelas_perkuliahan.dosen_pengampu','jenis_kelengkapan_berkas')->get();
        return view('GKM.detail', compact('data'));
    }

    public function gkm_update(Request $request, $id){
        $file = $request->file('file');

        // dd($request);
        if ($file != null){
            if ($file->isValid()) {
                $path = $file->store('public/ttd');
                HasilVerifikasi::where('id', $id)->update([
                    'tanda_tangan_gkm' => $path
                ]);

                $data = HasilVerifikasi::where('id', $id)->first();
                if($data->timeline_perkuliahan == 3){
                    KelasPerkuliahan::where('id', $data->id_kelas_perkuliahan)->update([
                        'status' => 2
                    ]);
                }
                return back();
            }
        }
    }

    // End GKM

    // Jurusan
    
    public function jurusan_monitoring_index(){
        $data = KelasPerkuliahan::with('dosen_pengampu','matakuliah')->orderBy('tahun_akademik','DESC')->get();
        return view('Ketua_jurusan.monitoring.index', compact('data'));
    }

    public function jurusan_monitoring_detail($id){
        $data = DB::table('kelasperkuliahans')->where('kelasperkuliahans.id','=',$id)
        ->join('matakuliahs','matakuliahs.id','=','kelasperkuliahans.id_matakuliah')
        // ->join('users','users.nip','=','kelasperkuliahans.id_dosen_pengampu')
        ->join('hasilverifikasis','hasilverifikasis.id_kelas_perkuliahan','=','kelasperkuliahans.id')
        ->join('users','users.nip','=','kelasperkuliahans.id_dosen_pengampu')
        ->join('monitorings','monitorings.hasil_verifikasi_id','=','hasilverifikasis.id')
        ->get();

        $data1 = HasilVerifikasi::where('id_kelas_perkuliahan',$id)->with('dosen_verifikator','monitoring')->get();
        // return $data;
        return view('Ketua_jurusan.monitoring.detail',compact('data','data1'));
    }

    public function jurusan_penilaian_index(){
        $data = KelasPerkuliahan::with('dosen_pengampu','matakuliah')->orderBy('tahun_akademik','DESC')->get();
        return view('Ketua_jurusan.laporan_penilaian.index',compact('data'));
    }

    public function jurusan_penilaian_detail($id){
        $data = DB::table('kelasperkuliahans')->where('kelasperkuliahans.id','=',$id)
        ->join('matakuliahs','matakuliahs.id','=','kelasperkuliahans.id_matakuliah')
        // ->join('users','users.nip','=','kelasperkuliahans.id_dosen_pengampu')
        ->join('hasilverifikasis','hasilverifikasis.id_kelas_perkuliahan','=','kelasperkuliahans.id')
        ->join('users','users.nip','=','kelasperkuliahans.id_dosen_pengampu')
        ->join('monitorings','monitorings.hasil_verifikasi_id','=','hasilverifikasis.id')
        ->get();

        $data1 = HasilVerifikasi::where('id_kelas_perkuliahan',$id)->with('dosen_verifikator','monitoring')->get();

        return view('Ketua_jurusan.laporan_penilaian.detail', compact('data','data1'));
    }

    // End Jurusan
}
