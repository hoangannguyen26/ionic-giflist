<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Job;

use Illuminate\Support\Facades\Lang;

class JobController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'detail']]);
    }
    public function index()
    {
    	$job = Job::orderBy('created_at', 'desc')->first();
    	return view('job.index', [
        	'job' => $job 
    	]);
    }
    public function index_admin(Request $request)
    {
        $job = Job::first();
        return view('job.index_admin', [
            'job' => $job 
        ]);
    }
    public function store(Request $request)
    {
    	$attributes = [
            'content' => Lang::get('attr.job.content'),
        ];
        $this->validate(
            $request, 
            [
                'content' => 'required',
            ],
            [],
            $attributes
        );

        $job = new Job;
        $job->content = $request->content;
        $job->updatedBy()->associate(\Auth::user());
        $job->createdBy()->associate(\Auth::user());
        $job->save();

        return redirect('/admin/jobs');
    }

    public function update(Request $request, $jobId)
    {
    	$attributes = [
            'content' => Lang::get('attr.job.content'),
        ];
        $this->validate(
            $request, 
            [
                'content' => 'required',
            ],
            [],
            $attributes
        );

        $job = Job::findOrFail($jobId);
        $job->content = $request->content;
        $job->updatedBy()->associate(\Auth::user());
        $job->createdBy()->associate(\Auth::user());
        $job->update();

        return redirect('/admin/jobs');
    }
}
