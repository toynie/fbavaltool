@component('mail::message')
<!-- # Introduction -->
{{-- {{dd($dataEmail)}} --}}

{{-- {{dd($transactionQAResult)}} --}}

<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
         <tr style="border-collapse:collapse">
          <td align="center" style="padding:0;Margin:0">
           <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:100%">
             <tr style="border-collapse:collapse">
              <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
               <!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:270px" valign="top"><![endif]-->
               <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="width:100%; mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                 <tr style="border-collapse:collapse">
                  <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:270px">
                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                     {{-- <tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:17px;color:#333333"><strong><span>CONTINUE LATER<br>
                        </span></strong><strong></strong></p></td>
                     </tr> --}}
                     <tr>
                         <td>
                            Hi There!
                            <br>
                            <br>
                            Thank you for using our FREE Valuation Tool.
                            <br>
                            <br>
                            We saw that you haven’t finished filling out the form yet but you can always go back to complete the rest of the questionnaire by clicking
                            <a href="https://{{$_SERVER['SERVER_NAME']}}/freequestions?busstype={{$dataEmail['bussinessTypeId']}}&part={{$dataEmail['part']}}&transactionId={{$dataEmail['transactionId']}}">HERE.
                            </a>

                            <br>
                            <br>
                            Should you have any questions, please feel free to hit the reply button and send us an email.
                            <br>
                            <br>
                            <br>
                            Sincerely,
                            <br>
                            <br>
                            The Dealflow Team<br>
                            <img src="http://fbavaltool.com/img/dealflow_logo.png" styl="max-width:300px" alt="">
                         </td>
                     </tr>

                   </table></td>
                 </tr>
               </table>

            </td>
             </tr>


           </table></td>
         </tr>
       </table>




{{--
@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}


