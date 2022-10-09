<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelengkapanDokumen extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'jeniskelengkapandokumens';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id','kelengkapan_dokumen','tipe_penilaian'
    ];
}
