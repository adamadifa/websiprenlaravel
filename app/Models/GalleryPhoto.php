<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAdminStorage;

class GalleryPhoto extends Model
{
    use HasAdminStorage;

    protected $table = 'gallery_photos';

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }
}
