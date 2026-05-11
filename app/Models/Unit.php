<?php

namespace App\Models;

use App\Traits\HasAdminStorage;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasAdminStorage;
    protected $table = 'unit';
    protected $primaryKey = 'kode_unit';
    public $incrementing = false;
    protected $keyType = 'string';
}
