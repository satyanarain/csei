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
              1. After complete cash request display bills button in request list.
              2. Display request details and Added  add more functionality for submit bills.
              3. Added save functionality to upload bills document.
              4. Display request details with download bills document.
              
               /****************************************Date 04-05-2017******************************************************/
              1. Save service category record.
              2. Edit service category record.
              3. Create service category and email to requester and verifier after submit.
              4. After verify service category email to requester and verifier and approver.
              5. After approve service category email to requester and approver and administrator(associate).
              6.Create material form added add more functionality
              /****************************************Date 07-05-2017******************************************************/
              1.Save dynamic material details.
              2.Send email to requester and verifier
              3.List of material.
              3.View Material details.
              4.View Material details with verify and rejected functionality.
              5.Send email to verifier requester and approver
              /****************************************Date 08-05-2017******************************************************/
            
              1. View Material details with verify and rejected functionality.
              2. Send email to verifier requester and admin associate.
              3. List approved material request in pending action
              
                /****************************************Date 09-05-2017******************************************************/
              1. List of approved material.
              2. Add quotation button in pending action list section.
              3. Viewed material category with item list.
              4. Send material details to selected vendor.
              5. Send Email to vendor with link.
                /****************************************Date 10-05-2017******************************************************/
              1. Create vendor quotation form and dynamic display material details.
              2. Add functionality to save vendor quotation form.
              3. Create error page if quotation date expire.
              4. Display error message to vendor if record already exists
              5. Display vendor comparison list.
            
             /****************************************Date 21-05-2018******************************************************/
             1. Work with subhash 
             2. Change css of login page.
             3. Add Material details in each email verifier, approver,rejector 
             /****************************************Date 22-05-2018******************************************************/
             1. Added css for comment box
             2. Add height in loader.
             3. Remove approval button after approve material request.
             4. Replace quotation button to view button after send quotation.
             /****************************************Date 23-05-2018******************************************************/
             1. Remove repeating heading from each view page
             2. Change send to review button after quotation send to review.
             /****************************************Date 23-05-2018******************************************************/
             1. After purchase committee member comment change view button to commented 
             2. Hide comment box and button after comment.
             3. Add validation for release amount is less than requested amount.
             4.Increase height of side menu bar.
          
              
             
             
    
         