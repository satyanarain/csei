<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ServiceDocument extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    /*SELECT `id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `contact`, `profile_picture`, `manual_reset_password_token`, `approvers`, `verifiers`, `credit_limit`, `bank_name`, `account_no`, `ifsc_code`, `branch_address`, `registration_no`,
     *  `registration_no_upload`, `pan_no`, `pan_no_upload`, `gst_no`, `gst_no_upload` FROM `users` WHERE 1*/
   protected $table='service_documents';


   protected $guarded = ['id','action','service_document','category_id','user_id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    public function state()
    {
        return $this->belongsToMany(State::class, 'state_user', 'user_id', 'state_id');
    }
}
