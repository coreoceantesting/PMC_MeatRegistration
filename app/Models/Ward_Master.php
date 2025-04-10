<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward_Master extends Model
{
    use SoftDeletes;
    protected $table='ward_mst';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'ward_name',
        'inserted_dt',
        'inserted_by',
        'modified_dt',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    protected $dates = ['deleted_at'];
    // protected $primaryKey = 'dept_id';
}
