<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAdminStorage;

class GalleryAlbum extends Model
{
    use HasAdminStorage;

    protected $table = 'gallery_albums';

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }
}
