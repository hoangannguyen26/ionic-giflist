<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    //
    protected $table = 'tbl_tracking';

    public static function Track()
    {
    	$date = new \DateTime('now');
		$view_date = $date->format('Y-m-d');
    	\DB::statement('INSERT INTO tbl_tracking (view_date, view_count) VALUES ("'.$view_date.'", 1)
    	 ON DUPLICATE KEY UPDATE view_count=view_count+1');
    }
    public static function GetTrackInMonth()
    {
    	$date = new \DateTime('now');
		$view_month = $date->format('Y-m');
    	return self::where('view_date', 'LIKE', $view_month.'%')->sum('view_count');

    }
    public static function GetTrackAll()
    {
    	return self::all()->sum('view_count');
    }
}
