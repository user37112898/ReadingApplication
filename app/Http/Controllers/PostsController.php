<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Comment;
use App\CurrentPage;
use Carbon\Carbon;
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

    public function technology(){
        $posts = DB::select("SELECT * FROM posts WHERE tags LIKE '%Technology%'");

        return view('posts.index')->with('posts',$posts);
    }

    public function business(){
        $posts = DB::select("SELECT * FROM posts WHERE tags LIKE '%Business%'");

        return view('posts.index')->with('posts',$posts);
    }

    public function company(){
        $posts = DB::select("SELECT * FROM posts WHERE tags LIKE '%Company%'");

        return view('posts.index')->with('posts',$posts);
    }

    public function innovation(){
        $posts = DB::select("SELECT * FROM posts WHERE tags LIKE '%Innovation%'");

        return view('posts.index')->with('posts',$posts);
    }

    public function english(){
        $posts = DB::select("SELECT * FROM posts WHERE langauge='english'");
        // SELECT * FROM Customers WHERE Country='Mexico';

        return view('posts.index')->with('posts',$posts);
    }

    public function hindi(){
        $posts = DB::select("SELECT * FROM posts WHERE langauge='hindi'");

        return view('posts.index')->with('posts',$posts);
    }

    public function gujarati(){
        $posts = DB::select("SELECT * FROM posts WHERE langauge='gujarati'");

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
    public function selfev()
    {
        return view('posts.selfevaluation');
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
            'description'=>'required',
            'author'=>'required',
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->author = $request->input('author');
        $post->type = $request->input('type');
        $post->body = $request->input('body');
        $post->evaluation = $request->input('evaluation');
        $post->langauge = $request->input('langauge');

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


        $allusers = USER::all();
        foreach ($allusers as $user) {
            $cp = new CurrentPage;
            $cp->currentpage=1;
            $cp->userid=$user->id;
            $cp->postid=$post->id;
            $cp->status=0;
            $cp->ldate=Carbon::now()->format('Y-m-d');
            $cp->sdate=Carbon::now()->format('Y-m-d');
            $cp->result=0;
            $cp->save();
        }

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
        $cp=CurrentPage::find($id);
        $posts = Post::orderBy('created_at','desc')->paginate(10);

        return view('posts.show')->with(['post'=>$post,'bodyarray'=>$bodyarray,'posttags'=>$posttags,'comments'=>$post->comments,'currentpage'=>$cp,'posts'=>$posts]);

    }
    public function suggest($id)
    {


        $posts = Post::all();

        return view('posts.suggest')->with('posts',$posts);

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
        $post->langauge = $request->input('langauge');

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

    public function dash()
    {
      $total = DB::select('select name from users');
      //dd(sizeof($total));

      $books = DB::select('SELECT COUNT(type) FROM posts WHERE type=?',['Book']);

      $articles = DB::select('SELECT COUNT(type) FROM posts WHERE type=?',['Article']);

      $status1 = DB::select('select status from current_pages where status = ?', [1]);
      //dd(sizeof($status1));

      $status3 = DB::select('select status from current_pages where status = ?', [3]);
      //dd(sizeof($status3));

      $reader = DB::select('select userid, count(*) totalcount from current_pages where `status`=? group by userid having count(*)>? ORDER BY COUNT(*) DESC LIMIT ?',[2,1,1]);
      //dd($reader[0]->userid);

      if (count($reader)) {
        $readerName = User::find($reader[0]->userid);
        $name = $readerName->name;
      }
      else {
        $name = '';
      }
      //dd($readerName->name);

      $result = [
        'total' => sizeof($total),
        'books' => sizeof($books),
        'articles' => sizeof($articles),
        'status1' => sizeof($status1),
        'status3' => sizeof($status3),
        'readerName' => $name
      ];
      return view('posts.dashboard', compact('result'));

    }
}
