@component('mail::message')
<!-- # Introduction -->
{{-- {{dd($dataEmail["part"])}}  --}}
{{-- {{dd($transactionQAResult)}} --}}
{{-- {{dd($request)}} --}}

<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
         <tr style="border-collapse:collapse">
          <td align="center" style="padding:0;Margin:0">
           <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
             <tr style="border-collapse:collapse">
              <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
               <!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:270px" valign="top"><![endif]-->
               <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                 <tr style="border-collapse:collapse">
                  <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:270px">
                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                     <tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:17px;color:#333333"><strong><span>Continue the first part of Free Valuation Question <br>
                        {{-- ${{number_format($transactionQAResult["valuationRange$"][0])}} - ${{number_format($transactionQAResult["valuationRange$"][1])}} --}}
                        </span></strong><strong></strong></p></td>
                     </tr>

                   </table></td>
                 </tr>
               </table>
               <!--[if mso]></td><td style="width:20px"></td><td style="width:270px" valign="top"><![endif]-->
               <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                 <tr style="border-collapse:collapse">
                  <td align="left" style="padding:0;Margin:0;width:270px">
                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                     <tr style="border-collapse:collapse">
                      <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333"><b></b></p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table>
               <!--[if mso]></td></tr></table><![endif]--></td>
             </tr>
             <tr style="border-collapse:collapse">
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
                         <td>ContinueLink:
                            {{-- <a href="https://{{$_SERVER['SERVER_NAME']}}/freequestions?busstype=1&part=1">
                                https://{{$_SERVER['SERVER_NAME']}}/freequestions?busstype={{$dataEmail["bussinessTypeId"]}}&part={{$dataEmail["part"]}}&transactionId={{$dataEmail["transactionId"]}}
                            </a> --}}
                            <a href="https://{{$_SERVER['SERVER_NAME']}}/freequestions?busstype={{$dataEmail['bussinessTypeId']}}&part={{$dataEmail['part']}}&transactionId={{$dataEmail['transactionId']}}">
                                https://{{$_SERVER['SERVER_NAME']}}/freequestions?busstype={{$dataEmail["bussinessTypeId"]}}&part={{$dataEmail["part"]}}&transactionId={{$dataEmail["transactionId"]}}
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
                        <b>DealFlow Brokerage{{-- config('app.name') --}} </b>
                        @endcomponent

                    </p>
                    </td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>

           </table></td>
         </tr>
       </table>




{{--
@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}


