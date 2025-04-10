
<style>
@media print {
  #hide-print{
      display: none;
   }

   .menu, .printBtn, .navbar-brand,.navbar-nav{
     display: none !important;
   }

   Header {
      display: none !important;
    }
    Footer {
      display: none !important;
    }
}
.btn {
    display: inline-block;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border: 2px solid #3498db;
    border-radius: 5px;
    color: #3498db;
    background-color: #fff;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s;
    margin-left:20px;
}
</style>

@php
    $totalAmount = $invoice->per_day_capacity * 1500;
    $amountInWords = ucwords(convertToWords($totalAmount));
    
    function convertToWords($number) {
        $words = ["", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
        $teens = ["", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
        $tens = ["", "ten", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];

        if ($number < 10) {
            return $words[$number];
        } elseif ($number < 20) {
            return $teens[$number - 10];
        } elseif ($number < 100) {
            return $tens[$number / 10] . " " . $words[$number % 10];
        } elseif ($number < 1000) {
            return $words[$number / 100] . " hundred " . convertToWords($number % 100);
        } elseif ($number < 10000) {
            return $words[$number / 1000] . " thousand " . convertToWords($number % 1000);
        } elseif ($number < 1000000) {
            return convertToWords($number / 1000) . " thousand " . convertToWords($number % 1000);
        } else {
            return "Number out of range for this example.";
        }
    }
@endphp

<section class="content">
    <div class="body_scroll">
       

        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">

                        <!-- //table start -->
                            <table border=0 cellpadding=0 cellspacing=0 width=1088 style='border-collapse:
                             collapse;table-layout:fixed;width:816pt'>

                             <button class="btn btn-primary printBtn" style="color:white; background-color:blue" id="" onclick="window.print();">Print</button>

                             <col width=64 span=17 style='width:48pt'>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 width=64 style='height:15.0pt;width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                                  <td width=64 style='width:48pt'></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl65>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl66>&nbsp;</td>
                                  <td class=xl67>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl70>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71 colspan=5 style='padding-left:44px;'>
                                     <h4>पनवेल महानगरपालिका  </h4>
                                  </td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl72>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl70>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71 colspan=2 style='mso-ignore:colspan'>
                                    पशुसंवर्धन विभाग   
                                  </td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl71>&nbsp;</td>
                                  <td class=xl72>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td class=xl71 colspan=14 style='mso-ignore:colspan'>
                                    <hr style=" border-top: 1px dashed black;">
                                  </td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td colspan=5 style=''>
                                  जा.क्र. पमपा / पशुवैद्यकीय सेवा /   
                                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; / सन 2024-25
                                  </td>
                                  <td></td>
                                  <td colspan=2 ></td>
                                  
                             
                                  <td colspan=2 > दि- {{ date('d-m-Y') }}</td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                   <td></td>
                                   <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>प्रति,</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td colspan=6 style='mso-ignore:colspan'>Application no - {{$invoice->transport_license_no}}</td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68 colspan="4"><b>{{$invoice->applicant_fname.' '.$invoice->applicant_mname.' '.$invoice->applicant_lname}}</b></td>
                                  <!-- <td></td> -->
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                            
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68 colspan="4"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td>  विषय  - </td>
                                  <td colspan=11 style='mso-ignore:colspan'>
                          मांस/चिकन/मटण वाहतूक नवीन नोंदणी शुल्क /मांस/चिकन/मटण वाहतूक पुनर्नोंदणी शुल्क जमा करणेबाबत.  
                                  </td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td>
                                    संदर्भ -
                                  </td>
                                  <td colspan=4 style='mso-ignore:colspan'>
                                    आपला दिनांक {{date('d-m-Y', strtotime($invoice->inserted_dt))}}  चा अर्ज 
                                  </td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td colspan=15 style='mso-ignore:colspan;'>
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    उपरोक्त संदर्भिय विषयान्वये, आपण मांस/चिकन/मटण वाहतूक नोंदणी / पुनर्नोंदणी   शुल्कासाठी सादर केलेल्या अर्जानुसार शुल्क / पुनर्नोंदणी
                                    <br> {{$invoice->per_day_capacity * 1500}}  रु अक्षरी ({{ $amountInWords }})&nbsp;   
                                    इतक्या रकमेचा   Demand draft द्वारे हा लेखा विभाग, पनवेल 
                                    महानगरपालिका
                                  </td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td colspan=19 style='mso-ignore:colspan'>
                                    यांचेकडे जमा करावे    
                                     व जमा पावतीची प्रत  या कार्यालयाकडे सादर करावी. (H/P)  
                                  </td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                           
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td colspan="" style='mso-ignore:colspan'></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td colspan=9 style='mso-ignore:colspan'>
                                   Demand Draft Number ---------------------       &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Account no -           
                                  </td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td colspan=9 style='mso-ignore:colspan'>
                                   Demand Draft Amount ---------------------        
                                  </td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td colspan="" style='mso-ignore:colspan'></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td colspan="" style='mso-ignore:colspan'></td>
                                  <td></td>
                             </tr>  
                              <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td colspan=9 style='padding-left:2px;'>
                                    पशुधन विकास अधिकारी 
                                  </td>
                                  <td></td>
                              </tr>
                              
                              
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td colspan="4"> <h3>पनवेल महानगरपालिका  </h3 ></td>
                                  <td></td>
                                  <td class=xl69>&nbsp;</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                             </tr>
                             <tr height=20 style='height:15.0pt'>
                                  <td height=20 style='height:15.0pt'></td>
                                  <td class=xl68>&nbsp;</td>
                                  <td></td>