<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAdminStorage;

class Testimonial extends Model
{
    use HasAdminStorage;

    protected $table = 'testimonials';

    protected $fillable = [
        'nama',
        'testimoni',
        'foto',
        'status'
    ];
}
