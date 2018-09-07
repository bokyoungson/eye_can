<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public $timestamps = false;
    protected $table = 'user_info';
	protected $fillable = [
    	'id',
    	'device_id',
    	'user_email',
    	'user_name',
    	'user_phone',
    	'user_address',
    	'protector_name',
    	'protector_phone',
    	'protector_address',

     ];
}
