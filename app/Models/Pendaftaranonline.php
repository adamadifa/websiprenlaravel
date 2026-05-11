<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaranonline extends Model
{
    use HasFactory;
    protected $table = "pendaftaran_online";
    protected $primaryKey = "no_register";
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
