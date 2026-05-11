<?php

namespace App\Models;

use App\Traits\HasAdminStorage;
use Illuminate\Database\Eloquent\Model;

class PrestasiSiswa extends Model
{
    use HasAdminStorage;
    protected $table = 'prestasi_siswa';
}
