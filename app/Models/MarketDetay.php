<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketDetay extends Model
{
    use HasFactory;

    protected $table = 'market_detay';
    protected $guarded = [];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DELETED_AT = 'delete_at';

    public function usermarket()
    {
        return $this->belongsTo('App\Models\Market');
    }
}
