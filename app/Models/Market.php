<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Market extends Authenticatable
{
    use HasFactory;

    protected $table = "market";
    protected $guarded=[];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DELETED_AT = 'delete_at';

    public function marketdetay()
    {
        return $this->hasOne('App\Models\MarketDetay');
    }
}
