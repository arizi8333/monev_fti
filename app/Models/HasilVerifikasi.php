<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HasilVerifikasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'hasilverifikasis';

    protected $appends = ['ttd_url','ttd_url1'];
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id','id_dosen_verifikator','id_kelas_perkuliahan','timeline_perkuliahan',
        'status','tanggal','tanggal_verifikasi','tanda_tangan_verifikator','tanda_tangan_gkm','catatan'
    ];

    public function dosen_verifikator(){
        return $this->belongsTo(User::class,'id_dosen_verifikator','nip');
    }

    public function kelas_perkuliahan(){
        return $this->belongsTo(KelasPerkuliahan::class,'id_kelas_perkuliahan','id');
    }

    public function monitoring(){
        return $this->hasMany(Monitoring::class);
    }

    public function detailhasil(){
        return $this->hasMany(DetailHasilVerifikator::class);
    }

    // public function getTtdUrlGkmAttribute()
    // {
    //     return Storage::url(''.$this->tanda_tangan_gkm);
    // }

    public function getTtdUrlAttribute()
    {
        return Storage::url(''.$this->tanda_tangan_verifikator);
    }
    public function getTtdUrl1Attribute()
    {
        return Storage::url(''.$this->tanda_tangan_gkm);
    }
}
