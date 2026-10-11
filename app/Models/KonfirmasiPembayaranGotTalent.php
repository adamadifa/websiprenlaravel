<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiPembayaranGotTalent extends Model
{
    use HasFactory;

    protected $table = 'konfirmasi_pembayaran_got_talent';
    protected $guarded = [];

    public function pendaftaran()
    {
        return $this->belongsTo(PendaftaranGotTalent::class, 'pendaftaran_got_talent_id');
    }
}
