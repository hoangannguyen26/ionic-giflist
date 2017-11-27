<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tracking;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$view_in_month = Tracking::GetTrackInMonth();
    	$total_view = Tracking::GetTrackAll();
    	return view('admin.index',[
    		'view_in_month' => $view_in_month,
    		'total_view' => $total_view,
		]);
    }
}
