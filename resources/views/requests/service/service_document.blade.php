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
                                                    <label class="col-lg-4 col-form-label" for="val-username">Requisition No.</label>
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

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->c_status}}
                                                    </div>
                                                </div> 
                                                <div   class="formmain" onclick="showHide(this.id)" id="bank1">
                                                    <div class="plusminusbutton" id="plusminusbuttonbank1"></div>&nbsp;&nbsp; Service Document
                                                </div>

                                                <div class="row1"  id="formbank1" >
                                                    <div class="form-group row" id="input_doc">
                                                        <div  style="padding-left:0px;  margin-bottom:0px; width:100%;" >
                                                            <table   border="0" width="95%" style="margin:0px 20px 20px 20px;">
                                                                <tr  style="padding:10px 0px 10px 20px"><td  colspan="" align="left" valign="top" style="text-align:left;">Document</td>
                                                                    <td  colspan="" align="left" valign="top" style="text-align:left;">
                                                                        {!! Form::file('document[]',null , ['class' => 'form-control',required]) !!}
                                                                    </td>
                                                                    <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="margin-top:-20px;">
                                                        <label class="col-lg-4 col-form-label" for="contact"><div class="btn btn-success add-more" type="button" style="margin-bottom:10px;" id="add_field_doc"><i class="fa fa-plus" ></i>Add</div></label>
                                                        <div class="col-lg-6">
                                                        </div>
                                                    </div>
                                                </div>
                                                </br>         
                                                </br> 
                                                 <div class="col-lg-6">
                                                    <input  type="hidden"  name="id" value="{{$requests->id}}">
                                                    <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                                    <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                                    <button class="btn btn-primary submit" type="submit" name="service_document"  value="service_document"><i class="fa fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
         {!!Form::close()!!}