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

    /**
     * Get admin storage URL for karyawan photo with default folder 'photos/karyawan'
     *
     * @param string|null $path
     * @param string $folder
     * @return string
     */
    public function getAdminImageUrl($path, $folder = 'photos/karyawan')
    {
        if (!$path) {
            return 'https://placehold.co/400x500?text=Foto+Staff';
        }

        // If it's already a full URL, return it
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        // If path already starts with photos/karyawan/, avoid duplicate folder prefix
        if (str_starts_with(ltrim($path, '/'), 'photos/karyawan/')) {
            $folder = '';
        }

        $baseUrl = rtrim(config('app.admin_url', 'http://localhost:8000'), '/');
        $folder = $folder ? trim($folder, '/') . '/' : '';

        return "{$baseUrl}/storage/{$folder}{$path}";
    }
}
