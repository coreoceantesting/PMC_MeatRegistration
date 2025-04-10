<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taluka_Master extends Model
{
    use SoftDeletes;
    protected $table='mst_taluka';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'dist_id',
        'taluka_name',
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
