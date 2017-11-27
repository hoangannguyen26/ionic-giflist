<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Phongban;
use Illuminate\Support\Facades\Lang;

class PhongbanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['api_get_all']]);
    }

    public function index()
    {
        $phongbans = Phongban::all();
        return view('admin.phongban.index', [
                'phongbans' => $phongbans
            ]);
    }
    public function edit($id)
    {
        $phongban = Phongban::findOrFail($id);
        return view('admin.phongban.edit', [
            'phongban' => $phongban
        ]);
    }
    public function store(Request $request)
    {
        $attributes = [
            'ten_phong_ban' => Lang::get('attr.phongban.ten_phong_ban')
        ];
        $this->validate(
            $request, 
            [
                'ten_phong_ban' => 'required',
            ],
            [],
            $attributes
        );
        $phongban = new Phongban;
        $phongban->ten_phong_ban = $request->ten_phong_ban;
        $phongban->chu_thich = $request->chu_thich;
        $phongban->updatedBy()->associate(\Auth::user());
        $phongban->createdBy()->associate(\Auth::user());

        $phongban->save();
        return redirect('/admin/phongbans');
    }

    public function update(Request $request, $id)
    {
        $attributes = [
            'ten_phong_ban' => Lang::get('attr.phongban.ten_phong_ban')
        ];
        $this->validate(
            $request, 
            [
                'ten_phong_ban' => 'required'
            ],
            [],
            $attributes
        );
        $phongban = Phongban::findOrFail($id);
        $phongban->ten_phong_ban = $request->ten_phong_ban;
        $phongban->chu_thich = $request->chu_thich;
        $phongban->updatedBy()->associate(\Auth::user());

        $phongban->update();
        return redirect('/admin/phongbans');
    }

    public function destroy(Request $request, Phongban $phongban){
        $phongban->delete();
        return redirect('/admin/phongbans');
    }

    public function api_get_by_id(Request $request, $phongbanId)
    {
    	$phongban = Phongban::Find($phongbanId);
    	$response = array();
    	$response['error'] = true;
    	if($phongban)
    	{
    		$response['error'] = false;
    		$response['data'] = $phongban;
    	}
    	return response()->json($response);
    }

    public function api_get_all()
    {
        $response = array();
        $response['data'] = array();
        $phongbans = \DB::table('tbl_phongban')
            ->select('id', 'ten_phong_ban')
            ->get();
        foreach ($phongbans as $dt) {
            $tmp = array();
            $tmp['key'] = $dt->phongban_id;
            $tmp['value'] = $dt->phongban_name;
            array_push($response['data'], $tmp);
        }
        return response()->json($response);
    }
}
