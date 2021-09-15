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
                      <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:17px;color:#333333"><strong><span>RESULT OF FIRST PART <br>
                        </span></strong><strong></strong></p></td>
                     </tr> --}}
                     <tr>
                         <td>
                            Hi There!
                            <br>
                            <br>
                            Thank you for completing the first part of our questionaire.
                            <br>
                            <br>
                            Your estimated business valuation $ ${{number_format($transactionQAResult["valuationRange$"][0])}} - ${{number_format($transactionQAResult["valuationRange$"][1])}}
                            <br>
                            <br>
                            Interested to know the accurate valuation of your business? <a href="https://{{$_SERVER['SERVER_NAME']}}/freequestions?part=2&busstype={{$request->busstype_id}}&transactionId={{$transactionQAResult['transactionInfo']['transactionId']}}">CLICK HERE.</a>
                            <br>
                            <br>
                            <br>
                            Should you have any questions, please feel free to hit the reply button and send us an email.
                            <br>
                            <br>
                            <br>
                            Sincerely
                            <br>
                            <br>
                            The Dealflow Team<br>
                            <img src="http://fbavaltool.com/img/dealflow_logo.png" styl="max-width:300px" alt="">
                         </td>
                     </tr>

                   </table></td>
                 </tr>
               </table>
               {{-- <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                 <tr style="border-collapse:collapse">
                  <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:270px">
                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                     <tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:17px;color:#333333"><strong><span>YOUR BUSINESS VALUATION IS <br>
                        ${{number_format($transactionQAResult["valuationRange$"][0])}} - ${{number_format($transactionQAResult["valuationRange$"][1])}}
                        </span></strong><strong></strong></p></td>
                     </tr>

                   </table></td>
                 </tr>
               </table> --}}
               <!--[if mso]></td><td style="width:20px"></td><td style="width:270px" valign="top"><![endif]-->
               {{-- <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                 <tr style="border-collapse:collapse">
                  <td align="left" style="padding:0;Margin:0;width:270px">
                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                     <tr style="border-collapse:collapse">
                      <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333"><b></b></p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table> --}}
               <!--[if mso]></td></tr></table><![endif]--></td>
             </tr>
             {{-- <tr style="border-collapse:collapse">
              <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px">
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                 <tr style="border-collapse:collapse">
                  <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                     <tr style="border-collapse:collapse">
                      <td align="left" style="padding:0;Margin:0;padding-top:20px">
                        <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333">

                        </p>
                        </td>
                     </tr>

                     <tr>
                         <td>Result Link:<br>
                            <a href="https://{{$_SERVER['SERVER_NAME']}}/freeOutput?transactionId={{$transactionQAResult['transactionInfo']['transactionId']}}.&part={{$dataEmail['part']}}">https://{{$_SERVER['SERVER_NAME']}}/freeOutput?transactionId={{$transactionQAResult['transactionInfo']['transactionId']}}&part={{$dataEmail['part']}}</a>
                            <br><br><br>
                         </td>
                     </tr>
                     <tr @if ($dataEmail['part'] == 2) style="display:none"  @endif>
                         <td>Continue to Second Part of Free Questions for more accurate valuation:<br>
                            <a href="https://{{$_SERVER['SERVER_NAME']}}/freequestions?part=2&busstype={{$request->busstype_id}}&transactionId={{$transactionQAResult['transactionInfo']['transactionId']}}">
                                https://{{$_SERVER['SERVER_NAME']}}/freequestions?part=2&busstype={{$request->busstype_id}}&transactionId={{$transactionQAResult['transactionInfo']['transactionId']}}
                            </a>
                            <br><br><br>
                         </td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td align="left" style="padding:0;Margin:0;padding-top:20px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333">Now it's the time to insert your own content into it by dragging blocks and structures from the side panel to this template area.</p></td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td align="left" style="padding:0;Margin:0;padding-top:15px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333">When your email is ready, you can save it or export using one of available methods: to your MailChimp account or as a pure HTML.</p></td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td align="left" style="padding:0;Margin:0;padding-top:20px">
                      <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333">
                      Thanks,<br>

                        @endcomponent

                    </p>
                    </td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr> --}}

           </table></td>
         </tr>
       </table>




{{--
@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}


