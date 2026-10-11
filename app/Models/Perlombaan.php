<?php

namespace App\Models;

use App\Traits\HasAdminStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perlombaan extends Model
{
    use HasFactory, HasAdminStorage;

    protected $table = 'perlombaan';
    protected $guarded = [];

    public function jenjangPendidikan()
    {
        return $this->belongsTo(JenjangPendidikan::class, 'id_jenjang', 'id');
    }

    /**
     * URL poster/thumbnail dari storage admin (siprenpas)
     */
    public function getPosterUrlAttribute()
    {
        if ($this->thumbnail) {
            return $this->getAdminImageUrl($this->thumbnail);
        }
        return asset('images/agt/posters/' . \Illuminate\Support\Str::slug($this->jenis_perlombaan) . '.jpg');
    }

    /**
     * URL file Juknis/Juklak dari storage admin (siprenpas)
     */
    public function getJuknisUrlAttribute()
    {
        if ($this->juknis_juklak) {
            return $this->getAdminImageUrl($this->juknis_juklak);
        }
        return null;
    }

    /**
     * Format Biaya Pendaftaran Rupiah
     */
    public function getFormattedFeeAttribute()
    {
        if ((float) $this->biaya_pendaftaran <= 0) {
            return 'Gratis';
        }
        return 'Rp ' . number_format($this->biaya_pendaftaran, 0, ',', '.');
    }
}
