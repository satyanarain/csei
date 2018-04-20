<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CSEIRequest extends Model
{
	
    protected $table = 'requests';

    protected $guarded = ['action','request_id', 's_no', 'brief_details', 'expected_expense', 'remark'];
 
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
