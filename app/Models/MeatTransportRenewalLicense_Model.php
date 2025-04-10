<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeatTransportRenewalLicense_Model extends Model
{
    use SoftDeletes;
    protected $table='meat_transport_renewal_tbl';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Basic Details
        'id',
        'meat_transport_oldid',
        'trans_renwal_liceans_no',
        'applicant_title_id',
        'applicant_fname',
        'applicant_mname',
        'applicant_lname',
     
        'mobile_number',
       
        'aadhar_number',
        
        // Residential Address of Applicant
        'applicant_address',
        'district_id',
        'country_id',
        'state_id',
        'taluka_id',
        'zipcode',
        
        
        // Business Details
        'business_name',
        'vehical_register_no',
        'vehical_address',
        'from_date',
        'to_date',
        'meat_type',
        'per_day_capacity',
        'old_licence',
       
        
        
        
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
