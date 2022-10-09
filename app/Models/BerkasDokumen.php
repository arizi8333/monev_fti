<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasDokumen extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_berkas_dokumen';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'berkasdokumens';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id_kelas_perkuliahan','id_kategori_berkas','file_berkas','tanggal_upload','status','keterangan'
    ];

    public function kelas_perkuliahan(){
        return $this->belongsTo(KelasPerkuliahan::class,'id_kelas_perkuliahan','id');
    }

    public function kategori_berkas(){
        return $this->belongsTo(KategoriBerkas::class,'id_kategori_berkas','id');
    }
}
