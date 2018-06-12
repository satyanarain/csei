 {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'files'=>true])!!}
                <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                     <div class="form-group row">
                                Request No.
                                <div class="col-lg-6">
                                    {{$requests->request_no}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                Category
                                <div class="col-lg-6">
                                    {{$requests->name}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                Date of Requisition
                                <div class="col-lg-6">
                                    {{dateView($requests->due_date)}}  
                                </div>
                            </div>
                          <div class="form-group row">
                                Purpose
                                <div class="col-lg-6">
                                    {{$requests->purpose}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                Service Description
                                <div class="col-lg-6">
                                    {{$requests->description_of_use}}  
                                </div>
                            </div>
                     <div class="form-group row">
                         Required By
                         <div class="col-lg-6">
                             {{dateView($requests->required_by_date)}}  
                         </div>
                     </div>

                     <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Name Of Project
                                        <div class="col-lg-6">
                                            <input type="text" name="name_of_project" id="name_of_project"  class="form-control"  value="{{$requests->name_of_project}}" >
                                        </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head
                                        <div class="col-lg-6">
                                             <input type="text" name="project_expense_head" id='project_expense_head' class="form-control" value="{{$requests->project_expense_head}}" >
                                        </div>
                                    </div>

                     <div class="form-group row">
                         Total Expected Expense
                         <div class="col-lg-6">
                             {{$requests->amount}}  
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-lg-4 col-form-label" for="due_date">Status
                         <div class="col-lg-6">
                             {{$requests->c_status}}
                         </div>
                     </div>  
                     <div class="form-group row">
                         <label class="col-lg-4 col-form-label" for="purpose">Comments
                         <div class="col-lg-6">
                             <textarea  name="comments" id="comments"  class="form-control"></textarea>
                         </div>
                     </div>       
             @if(count($material_details)>0)
            <div   class="formmain1" onclick="showHide(this.id)" id="bank1">
                <div class="plusminusbutton" id="plusminusbuttonbank1"></div>&nbsp;&nbsp; <h2>Item Details</h2>
            </div>
<!--            <div class="row1"  id="formbank1">-->
                @if(count($material_details)>0)
                <table class="table table-bordered formmain">
                        <tr>
                        <th class="table-row-heading">S.No.</th>
                        <th class="table-row-heading">Product Name</th>
                        <th class="table-row-heading">Quantity</th>
                        <th class="table-row-heading">Remarks</th>
                   </tr>
                </table>
                @foreach($material_details as $value)
                <table class="table table-bordered table-striped table-hover bank_table">
                    <tr>
                        <td>{{$value->s_no}}</td>
                        <td>{{$value->product_name}}</td>
                        <td>{{$value->purchase_quantity}}</td>
                         <td align="left" valign="top" style="text-align:left;">{{$value->remark}}</td>
                       </tr>
                </table>
                @endforeach
                @endif
<!--            </div>-->
            @endif 
            <br>    <div class="col-lg-12" style="padding:0px; ">
                                              <input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                              <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                              <table width="100%" border="0">
                                                  <tr>
                                                      <td width="20%" valign="top" align="left" style="text-align:left;"><button class="btn btn-primary submit" type="submit" name="approve"  value="Approve" onclick="return loadAddApprove()" style=" margin-right:10px;"><i class="fa fa-check-circle"></i> Approve</button></td>
                                                      <td width="80%" valign="top" align="left" style="text-align:left;"><button class="btn btn-danger submit" type="submit" name="approverejected" value="Rejected"  onclick="return loadAdd()"><i class="fa fa-times-circle" aria-hidden="true"></i>Constraints</button></td>
                                                  </tr>  
                                              </table>
                                           </div>

                    </div>
                </div>

            </div>
                                    
 {!!Form::close()!!}
 

                               