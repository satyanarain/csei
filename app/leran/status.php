<table class="m_3012731993381030246content" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0;padding:0;width:100%" cellspacing="0" cellpadding="0" width="100%">
    <tbody><tr>
            <td class="m_3012731993381030246header" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:25px 0;text-align:center">
                <a href="http://localhost" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#bbbfc3;font-size:19px;font-weight:bold;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://localhost&amp;source=gmail&amp;ust=1522990027688000&amp;usg=AFQjCNEfQsgyWgIFnCHJIDNWZBNUuVgANw">
                    CSEI
                </a>
            </td>
        </tr>
        <tr>
            <td class="m_3012731993381030246body" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;border-bottom:1px solid #edeff2;border-top:1px solid #edeff2;margin:0;padding:0;width:100%" width="100%">
                <table class="m_3012731993381030246inner-body" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;margin:0 auto;padding:0;width:570px" cellspacing="0" cellpadding="0" align="center" width="570">
                    <tbody><tr>
                            <td class="m_3012731993381030246content-cell" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px"><span class="im">
                                    <h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">Hi Satyanarain,</h1>
                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">A request for Rs. 2000 has been created. Please review and Verify.</p>
                                </span><p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">Thanks,<br>
                                    Administrator(csei)</p>
                                  </td>
                        </tr>
                    </tbody></table>
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
<td>
              @if($request->status == '0')
                <span class="badge badge-primary">Requested</span>
              @elseif($request->status == '1')
                <span class="badge badge-secondary">Verified</span>
              @elseif($request->status == '2')
                <span class="badge badge-info">Approved</span>
              @elseif($request->status == '3')
                <span class="badge badge-warning">Reconciliation</span>
              @elseif($request->status == '4')
                <span class="badge badge-success">Closed</span>
              @else
                <span class="badge badge-danger">Rejected</span>
              @endif
              </td>
              
              /****************************************Date 1-5-2017******************************************************/
              1. Remove white space from Rs from all email template.
              2. List of all approve record(which is not showing).
              3. Fix date in approve section.
              4. Display All field in save requested.
              5. Add save functionality to save(voucher) request and create email template to requester and administrator.
              6. Display Download button after save request(voucher).
              /****************************************Date 02-05-2017******************************************************/
              1. Display after save voucher view button.
              2. Display voucher details.
              3. Change approved request to pending action.
               /****************************************Date 03-05-2017******************************************************/
              1. After complete cash request display bills button in user request list.
              2. Display request details and Added  add more functionality for submit bills.
              3. Added save functionality to document upload.
              4. Display request details with download documment.
         