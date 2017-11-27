<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CongVanPB;
use Illuminate\Support\Facades\Lang;

class CongVanPBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'detail']]);
        $this->middleware('admin', ['except' => ['index', 'detail']]);
    }
    public function index(Request $request)
    {
        $congvans = array();
        if($request->ma_phong_ban != null)
            $congvans = CongVanPB::where('ma_phong_ban',$request->ma_phong_ban)->get();
        else
            $congvans = CongVanPB::orderBy('created_at', 'desc')
            ->get();
    	return view('congvan.index', [
        	'congvans' => $congvans 
    	]);
       // return response()->json($congvans);
    }
    public function detail(Request $request, $id)
    {
        $congvan = CongVanPB::findOrFail($id);
        return view('congvan.detail', [
            'congvan' => $congvan 
        ]);
    }
    public function index_admin(Request $request)
    {
        $congvans = CongVanPB::all();
        return view('congvan.index_admin', [
            'congvans' => $congvans 
        ]);
    }
    public function edit(Request $request, CongVanPB $congvan)
    {
        return view('congvan.edit', [
            'congvan' => $congvan 
        ]);
    }

    public function store(Request $request)
    {
        $attributes = [
            'tieu_de_cv' => Lang::get('attr.congvan.title'),
            'noi_dung_cv' => Lang::get('attr.congvan.content'),
            'ma_phong_ban' => Lang::get('attr.congvan.township_id'),
        ];
        $this->validate(
            $request, 
            [
                'tieu_de_cv' => 'required',
                'noi_dung_cv' => 'required',
                'ma_phong_ban' => 'required',
            ],
            [],
            $attributes
        );
        $congvan = new CongVanPB;
        $congvan->tieu_de_cv = $request->tieu_de_cv;
        $congvan->noi_dung_cv = $request->noi_dung_cv;
        $congvan->ma_phong_ban = $request->ma_phong_ban;
        $congvan->chu_thich = $request->chu_thich;

        $congvan->updatedBy()->associate(\Auth::user());
        $congvan->createdBy()->associate(\Auth::user());
        $congvan->save();
        return redirect('/admin/congvans');
    }
    public function update(Request $request, $congvanId)
    {
        $attributes = [
            'tieu_de_cv' => Lang::get('attr.congvan.title'),
            'noi_dung_cv' => Lang::get('attr.congvan.content'),
            'ma_phong_ban' => Lang::get('attr.congvan.township_id'),
        ];
        $this->validate(
            $request, 
            [
                'tieu_de_cv' => 'required',
                'noi_dung_cv' => 'required',
                'ma_phong_ban' => 'required',
            ],
            [],
            $attributes
        );
        $congvan = CongVanPB::findOrFail($congvanId);
        $congvan->tieu_de_cv = $request->tieu_de_cv;
        $congvan->noi_dung_cv = $request->noi_dung_cv;
        $congvan->ma_phong_ban = $request->ma_phong_ban;
        $congvan->chu_thich = $request->chu_thich;
        $congvan->updatedBy()->associate(\Auth::user());
        $congvan->createdBy()->associate(\Auth::user());
        $congvan->update();
        return redirect('/admin/congvans');

    }
    public function destroy(Request $request, CongVanPB $congvan){
        $congvan->delete();
        return redirect('/admin/congvans');
    }
}
