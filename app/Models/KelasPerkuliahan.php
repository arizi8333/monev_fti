<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPerkuliahan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'kelasperkuliahans';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id','id_dosen_pengampu','id_matakuliah','keterangan',
        'tahun_akademik','kurikulum','status'
    ];

    public function dosen_pengampu(){
        return $this->belongsTo(User::class,'id_dosen_pengampu','nip');
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class,'id_matakuliah','id');
    }

    public function verifikator(){
        return $this->hasMany(HasilVerifikasi::class);
    }
}
