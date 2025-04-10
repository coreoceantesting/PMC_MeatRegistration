<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeatRenewalLicense_Model extends Model
{
    use SoftDeletes;
    protected $table='meat_renewal_license_tbl';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Basic Details
        'id',
        'renwal_liceans_no',
        'meat_register_oldid',
        'applicant_title_id',
        'applicant_fname',
        'applicant_mname',
        'applicant_lname',
        'appl_dob',
        'appl_age',
        'mobile_number',
        'email',
        'gender',
        'aadhar_number',
        
        // Residential Address of Applicant
        'house_number',
        'house_name',
        'street_1',
        'street_2',
        'area_1',
        'area_2',
        'country_id',
        'state_id',
        'district_id',
        'taluka_id',
        'zipcode',
        
        // Business Details
        'business_name',
        'business_type',
        'meat_type',
        'per_day_capacity',
        'provision_water',
        'provision_electricty',
        'business_address',
        'sewerage_disposing',
        'prcision_dispose_id',
        'place_id',
        
        'regi_authority_name',
        'register_number',
        'valid_till',
        
        'areaof_business_place',
        'business_place',
        'business_place_other',
        
        // Upload Document
        
        'adharcard_doc',
        'meat_license_doc',
        'fee_receipt_doc',
        'authority_letter_doc',
        
        'residitional_proof_doc',
        'legal_business_doc',
        'business_registration_doc',
        
        'agreement_owner_doc',
        'noc_owner_doc',
        'property_tax_doc',
        
        'paid_water_doc',
        'paid_receipt_doc',
        'treatment_authorized_doc',
        
        'fitness_certificate_doc',
        'issued_doc',
        'registration_doc',
        
        'slaughter_letter_doc',
        'applicant_signature',
        'profile_photo',
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
