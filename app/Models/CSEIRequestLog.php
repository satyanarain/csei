<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CSEIRequestLog extends Model
{
	
    protected $table = 'request_logs';

    protected $guarded = ['action'];
 
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
