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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $cp->currentpage=current_page;
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
    public function update(Request $request, $id)
    {
        //
        $cp=CurrentPage::find($id);
        $cp->userid=auth()->user()->id;
        $cp->postid=$post->id;
        $cp->currentpage=current_page;
        $cp->save();
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
