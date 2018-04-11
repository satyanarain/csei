<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	
    protected $table = 'purchases';

    protected $guarded = ['purchase_id', 'product_code', 'product_name', 'purchase_quantity', 'purchase_unit_rate', 'purchase_unit_amount','action'];
 
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    public function cstatus()
    {
    	return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
    	return $this->belongsTo(User::class, 'created_by');
    }
}
