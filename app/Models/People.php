<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Passport\HasApiTokens;
use Illuminate\Auth\Authenticatable;

class People extends Model
{
    use Authenticatable, HasApiTokens, HasFactory;

    protected $connection= 'sqlsrv';
    protected $table = 'people';
    protected $fillable = ['name', 'lastname', 'email'];
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = false;
}
