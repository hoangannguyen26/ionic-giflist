<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Report;

use Yajra\Datatables\Datatables;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('reports.index');
    }
    public function api_get_all_index(Request $request) {
    	$offset = 0;
    	if($request->start != ''){
    		$offset = $request->start;
    	}
    	\DB::statement(\DB::raw('set @rownum='.$offset));
        $queryBuilder = \DB::table('tbl_full_informations')
            ->selectRaw('@rownum  := @rownum  + 1 AS rownum, id, thang, du_ck, (_ck_bhxh + _ck_lai1 + _ck_bhyt + _ck_lai2 + _ck_bhtn + _ck_lai3) AS tong, COALESCE(updated_at, created_at) as updated_at')
            ->where('madvi', '=',$request->user()->username);
        if($request->user()->isAdmin())
        {
            $queryBuilder = \DB::table('tbl_full_informations')
            ->selectRaw('@rownum  := @rownum  + 1 AS rownum, id, madvi, tendvi, thang, du_dk, du_ck,(_ck_bhxh + _ck_lai1 + _ck_bhyt + _ck_lai2 + _ck_bhtn + _ck_lai3) AS tong, COALESCE(updated_at, created_at) as updated_at');
        }
	    return Datatables::of($queryBuilder)
            ->make(true);
	    
    }

    public function api_get_by_id(Request $request, $reportId){
        $queryBuilder = $request->user()->reports()->where('id', '=', $reportId);
        if($request->user()->isAdmin()){
            $queryBuilder = Report::where('id', '=', $reportId);
        }
        $report = $queryBuilder->with('quan')->first();
    	$response = array();
    	$response['error'] = false;
    	$response['data'] = $report;
        return response()->json($response);
    }
    public function foo(Request $request)
    {
        $response = array();
        $response['error'] = false;
        $response['data'] = array(
            [
                'name' => 'http://thongbaobhxh.vn',
                'port' => '80'
            ],
            [
                'name' => 'http://thongbaobhxh.vn',
                'port' => '8080'
            ]
        );
        return response()->json($response);
    }
}
