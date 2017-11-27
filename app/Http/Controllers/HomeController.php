<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

use App\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'foo']]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homepage = Home::first();
        return view('home',
            ['homepage' => $homepage]
        );
    }

    public function homepage() {
        $homepage = Home::first();
        return view('admin.homepage',
            ['homepage' => $homepage]
        );
    }
    public function store(Request $request) {
        $attributes = [
            'content' => Lang::get('attr.homepage.content'),
        ];
        $this->validate(
            $request, 
            [
                'content' => 'required',
            ],
            [],
            $attributes
        );
        $homepage = new Home;
        $homepage->content = $request->content;
        $homepage->updatedBy()->associate(\Auth::user());
        $homepage->createdBy()->associate(\Auth::user());
        $homepage->save();
        return redirect('/admin/homepage');
    }
    public function update(Request $request, $id) {

        $attributes = [
            'content' => Lang::get('attr.homepage.content'),
        ];
        $this->validate(
            $request, 
            [
                'content' => 'required',
            ],
            [],
            $attributes
        );
        $homepage = Home::find($id);
        $homepage->content = $request->content;
        $homepage->updatedBy()->associate(\Auth::user());
        $homepage->createdBy()->associate(\Auth::user());
        $homepage->update();
        return redirect('/admin/homepage');
    }
    public function foo(Request $request)
    {
        $response = array();
        $response['error'] = false;
        $response['data'] = array(
            [
                'name' => 'http://thongbaobhxh.vn/media/video.mp4',
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
