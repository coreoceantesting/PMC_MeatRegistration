<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department_Master extends Model
{
    use SoftDeletes;
    protected $table='department_mst';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'ward_id',
        'dept_name',
        'inserted_by',
        'inserted_dt',
        'modified_by',
        'modified_dt',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
    // protected $primaryKey = 'dept_id';
}
