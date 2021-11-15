<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AGallery extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'attractive_gallery';
    protected $hidden = ['created_at', 'updated_at'];
}
