<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Attachment;
use App\Tracking;
use Illuminate\Support\Facades\Lang;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'detail']]);
        $this->middleware('admin', ['except' => ['index', 'detail']]);
    }
    // public function showAll(Request $request)
    // {
    //     $posts = Post::all();
    //     return view('post.all', [
    //         'posts' => $posts 
    //     ]);
    // }
    public function index(Request $request)
    {
        Tracking::Track();
        $posts = array();
        if($request->township_id != null)
            $posts = Post::where('township_id',$request->township_id)->with('attachments')->get();
        else
            $posts = Post::with('attachments')
            ->orderBy('created_at', 'desc')
            ->get();
    	return view('post.index', [
        	'posts' => $posts 
    	]);
       // return response()->json($posts);
    }
    public function detail(Request $request, $id)
    {
        $post = Post::with('attachments')->findOrFail($id);
        return view('post.detail', [
            'post' => $post 
        ]);

        // return response()->json($post);
    }
    public function index_admin(Request $request)
    {
        $posts = Post::all();
        return view('post.index_admin', [
            'posts' => $posts 
        ]);
    }
    public function edit(Request $request, Post $post)
    {
        return view('post.edit', [
            'post' => $post 
        ]);
    }

    public function store(Request $request)
    {
        $attributes = [
            'title' => Lang::get('attr.post.title'),
            'content' => Lang::get('attr.post.content'),
            'township_id' => Lang::get('attr.post.township_id'),
        ];
        $this->validate(
            $request, 
            [
                'title' => 'required',
                'content' => 'required',
                'township_id' => 'required',
            ],
            [],
            $attributes
        );
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->township_id = $request->township_id;
        $post->updatedBy()->associate(\Auth::user());
        $post->createdBy()->associate(\Auth::user());
        $attachments = $request->file('attachments');
        if($post->save() && $request->hasFile('attachments'))
        {
            foreach ($attachments as $file) {
                $destinationPath = public_path().'/uploads';
                $filename = time().$file->getClientOriginalName();
                $type = $file->getClientOriginalExtension();

                $upload_success = $file->move($destinationPath, $filename);
                {
                    $attachment = new Attachment();
                    $attachment->path = $filename;
                    $attachment->type = $type;
                    $attachment->updatedBy()->associate(\Auth::user());
                    $attachment->createdBy()->associate(\Auth::user());
                    $post->attachments()->save($attachment);
                }
            }
        }
        


        return redirect('/admin/posts');
    }
    public function update(Request $request, $postId)
    {
        $attributes = [
            'title' => Lang::get('attr.post.title'),
            'content' => Lang::get('attr.post.content'),
            'township_id' => Lang::get('attr.post.township_id'),
        ];
        $this->validate(
            $request, 
            [
                'title' => 'required',
                'content' => 'required',
                'township_id' => 'required',
            ],
            [],
            $attributes
        );
        $post = Post::findOrFail($postId);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->township_id = $request->township_id;
        $post->updatedBy()->associate(\Auth::user());
        $post->update();
        return redirect('/admin/posts');
    }
    public function destroy(Request $request, Post $post){
        $post->delete();
        return redirect('/admin/posts');
    }
}
