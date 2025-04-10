<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApproverenewalAdmin_Model extends Model
{
    use SoftDeletes;
    protected $table='approve_by_admin_renewal_license_tbl';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'meat_pplication_id',
        'mobile_number',
        'total_recived_tax',
        'receipt_no',
        'date_of_receipt',
        'license_number',
        'date_of_license_obtain',
        'date',
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
