<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceInfo extends Model
{
    public $timestamps = false;
    protected $table = 'device_info';
	protected $fillable = [
    	'id',
    	'device_id',
    	'index',
    	'battery',
    	'locationX',
    	'locationY',
    	'angle',
    	'code',
    	'message',
     ];
}
