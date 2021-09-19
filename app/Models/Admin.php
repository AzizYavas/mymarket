<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table="admin";

    protected $fillable=['id','username','password','create_at','update_at'];

    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
