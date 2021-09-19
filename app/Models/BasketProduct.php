<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasketProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'basket_product';
    protected $guarded = [];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DELETED_AT = 'delete_at';

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
