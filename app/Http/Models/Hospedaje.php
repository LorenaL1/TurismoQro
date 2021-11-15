<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Hospedaje extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'hospedajes';
    protected $hidden = ['created_at', 'updated_at'];

    public function getGallery(){
    	return $this->hasMany(HGallery::class, 'hospedaje_id', 'id');

    }
}
