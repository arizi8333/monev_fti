<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerkas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'kategoriberkas';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    protected $fillable = [
        'id','nama_berkas'
    ];
}
