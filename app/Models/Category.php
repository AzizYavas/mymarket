<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "category";
    protected $guarded=[];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DELETED_AT = 'delete_at';


    public function prodcategory()
    {
        return $this->belongsToMany('App\Models\Product','catpro');
    }


}
