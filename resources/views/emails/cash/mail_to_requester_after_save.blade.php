<table class="m_3012731993381030246content" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0;padding:0;width:100%" cellspacing="0" cellpadding="0" width="100%">
    <tbody><tr>
            <td class="m_3012731993381030246header" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:25px 0;text-align:center">
                <a href="http://localhost" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#bbbfc3;font-size:19px;font-weight:bold;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://localhost&amp;source=gmail&amp;ust=1522990027688000&amp;usg=AFQjCNEfQsgyWgIFnCHJIDNWZBNUuVgANw">
                    {{Html::image('/images/logonicons/csei-60x60.png',array('style'=>''))}}
                </a>
            </td>
        </tr>
        <tr>
            <td class="m_3012731993381030246body" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;border-bottom:1px solid #edeff2;border-top:1px solid #edeff2;margin:0;padding:0;width:100%" width="100%">
                <table class="m_3012731993381030246inner-body" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;margin:0 auto;padding:0;width:570px" cellspacing="0" cellpadding="0" align="center" width="570">
                    <tbody><tr>
                            <td class="m_3012731993381030246content-cell" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px"><span class="im">
                                    <h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">Dear {{$name}},</h1>
<!--                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">A request for Rs. {{$amount}} has been created. Please review and Verify.</p>-->
                                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                   You have been issued Rs. {{$amount}} against your request number {{$request_no}} has been completed .</p>
                                <p style="color:#2f3133;">DETAILS</p>
                                    <p>
                                    <table align="left" valign="top" border="0" style="border:1px solid #dee2e6; width:100%" width="100%">
                                     <?php  
                                      $sql = DB::table('requests')->select('*')->where('request_no',$request_no)->first();
                                      $id=$sql->id;
                                      $sql_vou = DB::table('vouchers')->select('*')->where('request_id',$id)->first();
                                      ?>
                                           <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px; color:#2f3133; height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;" align="left" valign="top" width="15%">
                                                    Payment Type
                                                 </td>
                                                 <td style="padding:0px 0px 0px 10px; text-align:left;color:#2f3133;" align="left" valign="top" width="85%">
                                                 <?php if($sql_vou->payment_type==1)
                                                 {
                                                  echo "Cash";
                                                 }else {
                                                  echo "Bank"; 
                                                 } ?>
                                                </td>
                                                </tr>
                                           <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px; color:#2f3133; height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;text-align:left;" align="left" valign="top" >
                                                   Amount Requested
                                                 </td>
                                                 <td style="padding:0px 0px 0px 10px;text-align:left;color:#2f3133;" align="left" valign="top" style="padding:0px 0px 0px 10px; text-align:left;">
                                                 {{$sql->amount}}
                                                </td>
                                                </tr>
                                               <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px;color:#2f3133;  height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;text-align:left;" align="left" valign="top">
                                                   Release Amount
                                                 </td>
                                                 <td style="padding:0px 0px 0px 10px;text-align:left;color:#2f3133;" align="left" valign="top">
                                                 {{$sql_vou->release_voucher_amount}}
                                                </td>
                                                </tr>
                                             </table>
                                    </p>
                                    <br> 
                                    <br> 
                                 <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">Thanks,<br>
                                    CSEI Team</p>
                              </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                <table class="m_3012731993381030246footer" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0 auto;padding:0;text-align:center;width:570px" cellspacing="0" cellpadding="0" align="center" width="570"><tbody><tr>
                            <td class="m_3012731993381030246content-cell" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px" align="center">
                                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;line-height:1.5em;margin-top:0;color:#aeaeae;font-size:12px;text-align:center">© 2018 CSEI. All rights reserved.</p>
                            </td>
                        </tr></tbody></table>
            </td>
        </tr>
    </tbody>
</table>



