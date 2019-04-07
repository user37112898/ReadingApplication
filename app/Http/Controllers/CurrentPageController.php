<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\CurrentPage;

class CurrentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $cp=CurrentPage::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function inc($id){
        $cp=CurrentPage::find($id);
        // dd($id);
        // $cp = auth()->user()->id;
        $post=POST::find($id);
        $cp->userid=auth()->user()->id;
        $cp->postid=$id;
        if($cp->currentpage < count(str_split($post->body, 2600))){
            $cp->currentpage++;
        }
        if($cp->status==0){
            $cp->status=1;
        }
        if(($cp->status==1) && ($cp->currentpage==count(str_split($post->body, 2600)))){
            $cp->status=2;
        }
        $cp->save();
        // dd("heuyyy");
        // dd($task);
        return redirect()->route('posts.show',[$id]);
    }

    public function dec($id){
        $cp=CurrentPage::find($id);
        // dd($id);
        // $cp = auth()->user()->id;
        $cp->userid=auth()->user()->id;
        $cp->postid=$id;
        if($cp->currentpage>0){
            $cp->currentpage--;
        }
        $cp->save();
        // dd("heuyyy");
        // dd($task);
        return redirect()->route('posts.show',[$id]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*
        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->post_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->username = auth()->user()->name;
        $comment->useremail = auth()->user()->email;
        $comment->save();
        $post = Post::find($id);

        return redirect()->route('posts.show',[$post->id]);
        */

        $cp = new CurrentPage;
        $cp->userid=auth()->user()->id;
        $cp->postid=$post->id;
        $cp->status=1;
        $cp->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task)
    {
        //
        // $cp=CurrentPage::find($id);
        // dd($id);
        // $cp = auth()->user()->id;
        // $cp->userid=auth()->user()->id;
        // $cp->postid=$post->id;
        // $cp->currentpage=current_page;
        // $cp->save();
        // dd($task);
        return redirect()->route('posts.show',[$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
