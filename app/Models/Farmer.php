<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Farmer extends Authenticatable
{
    use HasFactory;

    protected $table = "farmer";
    protected $guarded=[];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    const DELETED_AT = 'delete_at';

    public function detay()
    {
        return $this->hasOne('App\Models\FarmerDetay');
    }
}
