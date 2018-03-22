<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CSEIRequest extends Model
{
	const REQUESTED_REQUEST = '0';
	const VERIFIED_REQUEST = '1';
	const APPROVED_REQUEST = '2';
	const BILL_SUBMITTED_REQUEST = '3';
	const CLOSED_REQUEST = '4';
	const REJECTED_BY__REQUEST = '5';
    protected $table = 'requests';

    protected $fillable = ['category_id', 'amount', 'purpose', 'due_date', 'status'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
    	return $this->belongsTo(User::class, 'created_by');
    }
}
