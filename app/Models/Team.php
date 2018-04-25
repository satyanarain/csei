<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Team extends Authenticatable
{
    use Notifiable, EntrustUserTrait;
  
    protected $guarded = ['action','status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
