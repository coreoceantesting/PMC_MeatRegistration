<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class expire_meat_license extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renew-meat-license:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This cronjob is used to check how many users PMC-Meat License Expired today.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        // ===== Meat license is_expired
        DB::table('meat_registration_tbl')->where('is_expired', 0)->orderByDesc('id')->chunk(100, function($data){
            foreach($data as $regData)
            {
                $currentMonth = Carbon::parse($regData->approve_date)->format('m');
                $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->format('Y-m-d') : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->format('Y-m-d');
                
                if(  Carbon::parse( $fiscalYear )->gte( Carbon::today()->format('Y-m-d') ) )
                {
                    DB::table('meat_registration_tbl')->where('id', $regData->id)->update([ 'is_expired'=> 1 ]);
                }
            }
        });
        
        // ===== Meat Renewal license is_expired
        DB::table('meat_renewal_license_tbl')->where('is_expired', 0)->orderByDesc('id')->chunk(100, function($data){
            foreach($data as $regData)
            {
                $currentMonth = Carbon::parse($regData->approve_date)->format('m');
                $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->format('Y-m-d') : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->format('Y-m-d');
                
                if(  Carbon::parse( $fiscalYear )->gte( Carbon::today()->format('Y-m-d') ) )
                {
                    DB::table('meat_renewal_license_tbl')->where('id', $regData->id)->update([ 'is_expired'=> 1 ]);
                }
            }
        });
        
         // ===== Vehicle license is_expired
        DB::table('meat_transport_register_tbl')->where('is_expired', 0)->orderByDesc('id')->chunk(100, function($data){
            foreach($data as $regData)
            {
                $currentMonth = Carbon::parse($regData->approve_date)->format('m');
                $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->format('Y-m-d') : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->format('Y-m-d');
                
                if(  Carbon::parse( $fiscalYear )->gte( Carbon::today()->format('Y-m-d') ) )
                {
                    DB::table('meat_transport_register_tbl')->where('id', $regData->id)->update([ 'is_expired'=> 1 ]);
                }
            }
        });
        
        // ===== Vehicle Renewal license is_expired
        DB::table('meat_transport_renewal_tbl')->where('is_expired', 0)->orderByDesc('id')->chunk(100, function($data){
            foreach($data as $regData)
            {
                $currentMonth = Carbon::parse($regData->approve_date)->format('m');
                $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->format('Y-m-d') : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->format('Y-m-d');
                
                if(  Carbon::parse( $fiscalYear )->gte( Carbon::today()->format('Y-m-d') ) )
                {
                    DB::table('meat_transport_renewal_tbl')->where('id', $regData->id)->update([ 'is_expired'=> 1 ]);
                }
            }
        });
        
                                               
        $currentMonth = Carbon::today()->format('m');
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        
        // $currentMonth = Carbon::today()->format('m');
        // $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
  
        $firstMeatLicenseReminderUsers = DB::table('meat_registration_tbl')
                                        ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(7))
                                        ->orderBy('id')
                                        ->chunk(200, function($users){
                                            foreach($users as $user)
                                            {
                                                // ==== Message  Sending by OTP
                                                $app_no = $user->meat_pplication_no.$user->id;
                                                $scheme = 'Your Meat License Expiring in 7 days. Remember to renew and keep your beloved companion licensed and protected.';
                                                $domain = "https://".$_SERVER['HTTP_HOST'];
                        
                                                $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                $tempID= '1207167447455213113';
                                                $this->sendsms($msg,$user->mobile_number,$tempID);
                                            }
                                        });

        $secondMeatLicenseReminderUsers = DB::table('meat_registration_tbl')
                                        ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(3))
                                        ->orderBy('id')
                                        ->chunk(200, function($users){
                                            foreach($users as $user)
                                            {
                                                // ==== Message  Sending by OTP
                                                $app_no = $user->meat_pplication_no.$user->id;
                                                $scheme = "Only 3 days left! Don't forget to renew your Meat License to ensure your loyal companion stays licensed and protected.";
                                                $domain = "https://".$_SERVER['HTTP_HOST'];
                        
                                                $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                $tempID= '1207167447455213113';
                                                $this->sendsms($msg,$user->mobile_number,$tempID);
                                            }
                                        });

        $thirdMeatLicenseReminderUsers = DB::table('meat_registration_tbl')
                                        ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDay())
                                        ->orderBy('id')
                                        ->chunk(200, function($users){
                                            foreach($users as $user)
                                            {
                                                // ==== Message  Sending by OTP
                                                $app_no = $user->meat_pplication_no.$user->id;
                                                $scheme = 'Your Meat License has expired. Renew immediately to keep your beloved companion licensed and protected.';
                                                $domain = "https://".$_SERVER['HTTP_HOST'];
                        
                                                $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                $tempID= '1207167447455213113';
                                                $this->sendsms($msg,$user->mobile_number,$tempID);
                                            }
                                        });
                                        
        $firstMeatRenewalLicenseReminderUsers = DB::table('meat_renewal_license_tbl')
                                                ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(7))
                                                ->orderBy('id')
                                                ->chunk(200, function($users){
                                                    foreach($users as $user)
                                                    {
                                                        // ==== Message  Sending by OTP
                                                        $app_no = $user->renwal_liceans_no.$user->id;
                                                        $scheme = 'Your Meat License Expiring in 7 days. Remember to renew and keep your beloved companion licensed and protected.';
                                                        $domain = "https://".$_SERVER['HTTP_HOST'];
                                
                                                        $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                        $tempID= '1207167447455213113';
                                                        $this->sendsms($msg,$user->mobile_number,$tempID);
                                                    }
                                                });

        $secondMeatRenewalLicenseReminderUsers = DB::table('meat_renewal_license_tbl')
                                                ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(3))
                                                ->orderBy('id')
                                                ->chunk(200, function($users){
                                                    foreach($users as $user)
                                                    {
                                                        // ==== Message  Sending by OTP
                                                        $app_no = $user->renwal_liceans_no.$user->id;
                                                        $scheme = "Only 3 days left! Don't forget to renew your Meat License to ensure your loyal companion stays licensed and protected.";
                                                        $domain = "https://".$_SERVER['HTTP_HOST'];
                                
                                                        $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                        $tempID= '1207167447455213113';
                                                        $this->sendsms($msg,$user->mobile_number,$tempID);
                                                    }
                                                });

        $thirdMeatRenewalLicenseReminderUsers = DB::table('meat_renewal_license_tbl')
                                                ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDay())
                                                ->orderBy('id')
                                                ->chunk(200, function($users){
                                                    foreach($users as $user)
                                                    {
                                                        // ==== Message  Sending by OTP
                                                        $app_no = $user->renwal_liceans_no.$user->id;
                                                        $scheme = 'Your Dog License has expired. Renew immediately to keep your beloved companion licensed and protected.';
                                                        $domain = "https://".$_SERVER['HTTP_HOST'];
                                
                                                        $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                        $tempID= '1207167447455213113';
                                                        $this->sendsms($msg,$user->mobile_number,$tempID);
                                                    }
                                                });
                                                
          $firstVehicleLicenseReminderUsers = DB::table('meat_transport_register_tbl')
                                            ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(7))
                                            ->orderBy('id')
                                            ->chunk(200, function($users){
                                            foreach($users as $user)
                                            {
                                                // ==== Message  Sending by OTP
                                                $app_no = $user->transport_license_no.$user->id;
                                                $scheme = 'Your Vehicle License Expiring in 7 days. Remember to renew and keep your beloved companion licensed and protected.';
                                                $domain = "https://".$_SERVER['HTTP_HOST'];
                        
                                                $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                $tempID= '1207167447455213113';
                                                $this->sendsms($msg,$user->mobile_number,$tempID);
                                            }
                                        });

        $secondVehicleLicenseReminderUsers = DB::table('meat_transport_register_tbl')
                                        ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(3))
                                        ->orderBy('id')
                                        ->chunk(200, function($users){
                                            foreach($users as $user)
                                            {
                                                // ==== Message  Sending by OTP
                                                $app_no = $user->transport_license_no.$user->id;
                                                $scheme = "Only 3 days left! Don't forget to renew your Vehicle License to ensure your loyal companion stays licensed and protected.";
                                                $domain = "https://".$_SERVER['HTTP_HOST'];
                        
                                                $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                $tempID= '1207167447455213113';
                                                $this->sendsms($msg,$user->mobile_number,$tempID);
                                            }
                                        });

        $thirdVehicleLicenseReminderUsers = DB::table('meat_transport_register_tbl')
                                            ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDay())
                                            ->orderBy('id')
                                            ->chunk(200, function($users){
                                            foreach($users as $user)
                                            {
                                                // ==== Message  Sending by OTP
                                                $app_no = $user->transport_license_no.$user->id;
                                                $scheme = 'Your Vehicle License has expired. Renew immediately to keep your beloved companion licensed and protected.';
                                                $domain = "https://".$_SERVER['HTTP_HOST'];
                        
                                                $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                $tempID= '1207167447455213113';
                                                $this->sendsms($msg,$user->mobile_number,$tempID);
                                            }
                                        });
                                        
         $firstVehicleRenewalLicenseReminderUsers = DB::table('meat_transport_renewal_tbl')
                                                ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(7))
                                                ->orderBy('id')
                                                ->chunk(200, function($users){
                                                    foreach($users as $user)
                                                    {
                                                        // ==== Message  Sending by OTP
                                                        $app_no = $user->trans_renwal_liceans_no.$user->id;
                                                        $scheme = 'Your Vehicle License Expiring in 7 days. Remember to renew and keep your beloved companion licensed and protected.';
                                                        $domain = "https://".$_SERVER['HTTP_HOST'];
                                
                                                        $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                        $tempID= '1207167447455213113';
                                                        $this->sendsms($msg,$user->mobile_number,$tempID);
                                                    }
                                                });

        $secondVehicleRenewalLicenseReminderUsers = DB::table('meat_transport_renewal_tbl')
                                                ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDays(3))
                                                ->orderBy('id')
                                                ->chunk(200, function($users){
                                                    foreach($users as $user)
                                                    {
                                                        // ==== Message  Sending by OTP
                                                        $app_no = $user->trans_renwal_liceans_no.$user->id;
                                                        $scheme = "Only 3 days left! Don't forget to renew your Meat License to ensure your loyal companion stays licensed and protected.";
                                                        $domain = "https://".$_SERVER['HTTP_HOST'];
                                
                                                        $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                        $tempID= '1207167447455213113';
                                                        $this->sendsms($msg,$user->mobile_number,$tempID);
                                                    }
                                                });

        $thirdVehicleRenewalLicenseReminderUsers = DB::table('meat_transport_renewal_tbl')
                                                ->whereDate('inserted_dt', '>=', Carbon::parse($fiscalYear)->subDay())
                                                ->orderBy('id')
                                                ->chunk(200, function($users){
                                                    foreach($users as $user)
                                                    {
                                                        // ==== Message  Sending by OTP
                                                        $app_no = $user->trans_renwal_liceans_no.$user->id;
                                                        $scheme = 'Your Dog License has expired. Renew immediately to keep your beloved companion licensed and protected.';
                                                        $domain = "https://".$_SERVER['HTTP_HOST'];
                                
                                                        $msg = "Your Application no :- $app_no. $scheme You can also track your application on $domain";
                                                        $tempID= '1207167447455213113';
                                                        $this->sendsms($msg,$user->mobile_number,$tempID);
                                                    }
                                                });
                                                
                
        $this->info("PMC Meat License users registered");
    }

    

   protected function sendsms($sms,$mobile_number,$tempID)
    {

        $user = "mohit";
		$password = "123456";
		$sender_id = 'CoreOc';

		$sender = $mobile_number;
		$priority = "ndnd";


        $key= 'Ef96BBH3ZZPSXoz6';
		$route= 2;


		$sms_type = "normal";
		$message = $sms;


		$data = array('apikey'=>$key,'unicode'=>$route,'senderid'=>$sender_id,'number'=>$sender,'message'=>$message,'templateid'=>$tempID);

		$ch = curl_init('http://sms.seqtech.in/api/smsapi?');
        $ch = curl_init('http://sms.adityahost.com/vb/apikey.php?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		try
		{
			$response = curl_exec($ch);
			curl_close($ch);
            return $response;
		}
		catch(Exception $e)
		{
			return 0;
			echo 'Message: ' .$e->getMessage();

		}


    }
}
