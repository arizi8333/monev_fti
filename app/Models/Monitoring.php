<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'monitorings';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id','hasil_verifikasi_id','jumlah_mahasiswa','tanggal',
        'materi','pertemuan','jam_mulai','jam_selesai','bukti'
    ];

    public function hasil_verifikasi(){
        return $this->belongsTo(HasilVerifikasi::class,'hasil_verifikasi_id','id');
    }
}
