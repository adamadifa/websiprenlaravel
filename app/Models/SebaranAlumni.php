<?php

namespace App\Models;

use App\Traits\HasAdminStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SebaranAlumni extends Model
{
    use HasFactory, HasAdminStorage;

    protected $table = 'sebaran_alumni';

    protected $fillable = [
        'logo',
        'nama_universitas',
    ];
}
