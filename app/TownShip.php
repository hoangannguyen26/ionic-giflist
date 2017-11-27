<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TownShip extends Model
{
    protected $table = 'tbl_townships';
    protected $primaryKey = 'township_id';
    protected $hidden = array('created_at', 'updated_at');
    protected $fillable = array (
    	'township_id',
    	'township_name',
    	'address',
    	'bank_info',
    );
}
