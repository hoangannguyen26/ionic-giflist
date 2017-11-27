<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TownShip;

use Illuminate\Support\Facades\Lang;

class TownShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['api_get_all']]);
    }

    public function index()
    {
        $townships = TownShip::all();
        return view('admin.townships.index', [
                'townships' => $townships
            ]);
    }
    public function edit($id)
    {
        $township = TownShip::findOrFail($id);
        return view('admin.townships.edit', [
            'township' => $township
        ]);
    }
    public function store(Request $request)
    {
        $attributes = [
            'township_id' => Lang::get('attr.township.township_id'),
            'township_name' => Lang::get('attr.township.township_name'),
            'address' => Lang::get('attr.township.address'),
            'bank_info' => Lang::get('attr.township.bank_info'),
        ];
        $this->validate(
            $request, 
            [
                'township_id' => 'required|unique:tbl_townships',
                'township_name' => 'required',
                'address' => 'required',
                'bank_info' => 'required',
            ],
            [],
            $attributes
        );
        $township = new TownShip;
        $township->township_id = $request->township_id;
        $township->township_name = $request->township_name;
        $township->address = $request->address;
        $township->bank_info = $request->bank_info;

        $township->save();
        return redirect('/admin/townships');
    }

    public function update(Request $request, $id)
    {
        $attributes = [
            // 'township_id' => Lang::get('attr.township.township_id'),
            'township_name' => Lang::get('attr.township.township_name'),
            'address' => Lang::get('attr.township.address'),
            'bank_info' => Lang::get('attr.township.bank_info'),
        ];
        $this->validate(
            $request, 
            [
                // 'township_id' => 'required|unique:tbl_townships',
                'township_name' => 'required',
                'address' => 'required',
                'bank_info' => 'required',
            ],
            [],
            $attributes
        );
        $township = TownShip::findOrFail($id);
        // $township->township_id = $request->township_id;
        $township->township_name = $request->township_name;
        $township->address = $request->address;
        $township->bank_info = $request->bank_info;

        $township->update();
        return redirect('/admin/townships');
    }

    public function destroy(Request $request, TownShip $township){
        $township->delete();
        return redirect('/admin/townships');
    }

    public function api_get_by_id(Request $request, $townShipId)
    {
    	$townShip = TownShip::Find($townShipId);
    	$response = array();
    	$response['error'] = true;
    	if($townShip)
    	{
    		$response['error'] = false;
    		$response['data'] = $townShip;
    	}
    	return response()->json($response);
    }

    public function api_get_all()
    {
        $response = array();
        $response['data'] = array();
        $townships = \DB::table('tbl_townships')
            ->select('township_id', 'township_name')
            ->get();
        foreach ($townships as $dt) {
            $tmp = array();
            $tmp['key'] = $dt->township_id;
            $tmp['value'] = $dt->township_name;
            array_push($response['data'], $tmp);
        }
        return response()->json($response);
    }
}
