<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HGallery extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'hospedaje_gallery';
    protected $hidden = ['created_at', 'updated_at'];
}
