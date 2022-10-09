<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'matakuliahs';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id','id_prodi','nama_matakuliah','kategori_matakuliah',
        'kuota','sks','semester'
    ];

    public function prodi(){
        return $this->belongsTo(Prodi::class,'id_prodi','id');
    }
}
