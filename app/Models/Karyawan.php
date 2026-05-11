<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAdminStorage;

class Karyawan extends Model
{
    use HasAdminStorage;

    protected $table = 'karyawan';
    protected $primaryKey = 'npp';
    public $incrementing = false;
    protected $keyType = 'string';

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'kode_jabatan', 'kode_jabatan');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'kode_unit', 'kode_unit');
    }
}
