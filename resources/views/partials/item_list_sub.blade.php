<th><input type="text" class="form-control product_code" size="5" name="s_no[]" value="{{$vendor_value_all->s_no}}" readonly="readonly">
<input type="hidden" class="form-control product_code" size="5" name="material_id[]" value="{{$vendor_value_all->material_id}}" readonly="readonly">
</th>
<th><input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$vendor_value_all->product_name}}" readonly="readonly"></th>
<th> <input type="text" class="form-control" size="5" name="purchase_quantity[]"  required="required" value="{{$vendor_value_all->purchase_quantity}}" readonly="readonly"></th>
<th><input type="text" class="form-control" size="5" name="purchase_unit_rate[]"  required="required" readonly="readonly" value="{{$vendor_value_all->purchase_unit_rate}}"></th>
<th><input type="text" class="form-control" size="5" name="gst[]"  required="required" readonly="readonly" value="{{$vendor_value_all->gst}}"></th>
<th> <input type="text" class="form-control" size="7" name="purchase_unit_amount[]" readonly="readonly" value="{{$vendor_value_all->purchase_unit_amount}}"></th>
<th> <input type="text" class="form-control" size="7" name="purchase_unit_amount[]" readonly="readonly" value="{{dateView($vendor_value_all->timeline)}}"></th>
<th><input type="text" class="form-control" size="7" name="remark[]"  readonly="readonly"  value="{{$vendor_value_all->remark}}"></th>
<th><input type="text" class="form-control" size="7" name="vendor_remark[]"  readonly="readonly"  value="{{$vendor_value_all->vendor_remark}}">
</th>