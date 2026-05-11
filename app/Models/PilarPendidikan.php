<?php

namespace App\Models;

use App\Traits\HasAdminStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilarPendidikan extends Model
{
    use HasFactory, HasAdminStorage;

    protected $table = 'pilar_pendidikan';

    protected $fillable = [
        'nama_pilar',
        'deskripsi',
        'urutan',
    ];
}
