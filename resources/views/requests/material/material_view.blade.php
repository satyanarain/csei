<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <h4 class="header2">Requests Details</h4>
             <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Request No.</label>
                <div class="col-lg-6">
                    {{$requests->request_no}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Category</label>
                <div class="col-lg-6">
                    {{$requests->name}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Date of Requisition</label>
                <div class="col-lg-6">
                    {{dateView($requests->due_date)}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Amount Requested</label>
                <div class="col-lg-6">
                    {{$requests->amount}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                <div class="col-lg-6">
                    {{$requests->purpose}}  
                </div>
            </div>
<!--            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
                <div class="col-lg-6">
                    {{$requests->description_of_use}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="due_date">Name Of Project</label>
                <div class="col-lg-6">
                    {{displayView($requests->name_of_project)}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
                <div class="col-lg-6">
                    {{displayView($requests->project_expense_head)}}
                </div>
            </div>
            @if($requests->date_of_release!='')
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="due_date">Date of Release</label>
                <div class="col-lg-6">
                    {{displayView($requests->date_of_release)}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="due_date">Release Amount (Rs)</label>
                <div class="col-lg-6">
                    {{displayView($requests-> release_voucher_amount)}}
                </div>
            </div>
            @endif-->
            
          <?php 
          $array_bills = explode(',', $requests->document);
          if (count($array_bills) > 0) { ?>
            <div   class="formmain" onclick="showHide(this.id)" id="bank1">
                <div class="plusminusbutton" id="plusminusbuttonbank1"></div>&nbsp;&nbsp; Bill Document
            </div>

            <div class="row1"  id="formbank1" >
                
                    <?php
                    

                    if (count($array_bills) > 0) {
                        foreach ($array_bills as $key => $array_bill) {
                            ?>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="due_date">Document</label>
                                <div class="col-lg-6">
                                    <a href="{{url('images/document/'.$array_bills[$key])}}" download="download" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
                                </div>
                            </div>
    <?php }
} ?>  
</div>
   <?php }
 ?>  
</div>
    </div>

</div>