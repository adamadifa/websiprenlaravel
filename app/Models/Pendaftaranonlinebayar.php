<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaranonlinebayar extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_online_bayar';
    protected $guarded = [];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaranonline::class, 'no_register', 'no_register');
    }
}
