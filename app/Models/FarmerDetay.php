<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerDetay extends Model
{
    use HasFactory;

    protected $table = 'farmer_detay';
    protected $guarded = [];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DELETED_AT = 'delete_at';

    public function userfarmer()
    {
        return $this->belongsTo('App\Models\Farmer');
    }
}
