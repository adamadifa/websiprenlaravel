<?php

namespace App\Models;

use App\Traits\HasAdminStorage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasAdminStorage;

    protected $table = 'posts';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
