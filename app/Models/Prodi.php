<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'prodis';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id','nama_prodi','nama_fakultas','jenjang_pendidikan'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
