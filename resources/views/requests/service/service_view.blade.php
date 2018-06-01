<div class="card">
    <div class="card-body">
        <div class="form-validation">
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
                <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                <div class="col-lg-6">
                    {{$requests->purpose}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Service Description</label>
                <div class="col-lg-6">
                    {{$requests->description_of_use}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Required By</label>
                <div class="col-lg-6">
                    {{dateView($requests->required_by_date)}}  
                </div>
            </div>

            
          <?php 
          if($requests->service_document!='')
          {
          $array_bills = explode(',', $requests->service_document);
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
          <?php }}
 ?>  
</div>
    </div>

</div>