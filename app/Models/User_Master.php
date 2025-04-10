<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Master extends Model
{
    use SoftDeletes;
    protected $table='users';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'm_name',
        'l_name',
        'mobile_number',
        'email',
        'email_verified_at',
        'password',
        'temporary_otp',
        'remember_token',
        'user_type',
        'inserted_dt',
        'inserted_by',
        'modified_dt',
        'deleted_at',
        'deleted_by',
       
    ];

    protected $dates = ['deleted_at'];
    // protected $primaryKey = 'dept_id';
}
