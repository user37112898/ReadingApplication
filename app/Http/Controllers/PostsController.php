<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
class PostsController extends Controller
{

    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        // $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('title','asc')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(10);

        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    public function contactus()
    {
        return view('posts.contactus');
    }
    public function dashboard()
    {
        return view('posts.dashboard');
    }
    public function show1()
    {
        return view('posts.show1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
        ]);        
        
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->author = $request->input('author');
        $post->type = $request->input('type');
        $post->body = $request->input('body');
        $post->evaluation = $request->input('evaluation');

        $tag = "";
        if($request->input('tag0')==1){
            $tag = $tag."Technology,";
        }
        if($request->input('tag1')==1){
            $tag = $tag."Business,";
        }
        if($request->input('tag2')==1){
            $tag = $tag."Company,";
        }
        if($request->input('tag3')==1){
            $tag = $tag."Innovation,";
        }
        $post->tags = $tag;
        // $post->tags = $request->input('tags');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $bodyarray = str_split($post->body, 2600);
        $posttags = explode(",",$post->tags);
        // return $post;
        
        return view('posts.show')->with(['post'=>$post,'bodyarray'=>$bodyarray,'posttags'=>$posttags,'comments'=>$post->comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $currentUser = User::find(auth()->user()->id);
        if($currentUser->isadmin!=1){
            return redirect('posts')->with('error','You are not authorized to view that page!!');
        }
        $posttags = explode(",",$post->tags);
        return view('posts.edit')->with(['post'=>$post,'posttags'=>$posttags]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->author = $request->input('author');
        $post->type = $request->input('type');
        $post->body = $request->input('body');
        $post->evaluation = $request->input('evaluation');
        
        $tag = "";
        if($request->input('tag0')==1){
            $tag = $tag."Technology,";
        }
        if($request->input('tag1')==1){
            $tag = $tag."Business,";
        }
        if($request->input('tag2')==1){
            $tag = $tag."Company,";
        }
        if($request->input('tag3')==1){
            $tag = $tag."Innovation,";
        }
        $post->tags = $tag;
        // $post->user_id=0;//$post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('success',$post->title.' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $currentUser = User::find(auth()->user()->id);
        if($currentUser->isadmin!=1){
            return redirect('posts')->with('error','You are not authorized to view that page!!');
        }
        $temp = $post->title;

        $post->delete();
        return redirect('/posts')->with('delete',$temp.' Deleted');
    }
}
