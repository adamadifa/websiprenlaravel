<?php

namespace App\Models;

use App\Traits\HasAdminStorage;
use Illuminate\Database\Eloquent\Model;

class PengaturanUmum extends Model
{
    use HasAdminStorage;
    protected $table = 'pengaturan_umum';
}
