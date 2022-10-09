<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailHasilVerifikator extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_hasil_verifikasi';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'detailhasilverifikators';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id_hasil_verifikasi','id_jenis_kelengkapan_dokumen','penilaian','keterangan',
    ];

    public function hasil_verifikasi(){
        return $this->belongsTo(HasilVerifikasi::class,'id_hasil_verifikasi','id');
    }

    public function jenis_kelengkapan_berkas(){
        return $this->belongsTo(JenisKelengkapanDokumen::class,'id_jenis_kelengkapan_dokumen','id');
    }
}
