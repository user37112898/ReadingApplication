<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = User::find(auth()->user()->id);
        if($currentUser->isadmin!=1){
            return redirect('posts')->with('error','You are not authorized to view that page!!');
        }
        $users = User::all();
        return view('users.index')->with('users',$users);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $cp = DB::select("SELECT * FROM current_pages WHERE userid=?",[$id]);
        // $post = DB::select("SELECT * FROM posts WHERE user_id=?",[$id]);
        foreach ($cp as $item) {
            $item->id;
            $postsname[]=Post::find($item->postid);
        }
        return view('users.show')->with(['user'=>$user,'cp'=>$cp,'postsname'=>$postsname]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentUser = User::find(auth()->user()->id);
        if($currentUser->isadmin!=1){
            return redirect('posts')->with('error','You are not authorized to view that page!!');
        }
        $user = User::find($id);
        $deletedUser = $user->name;
        $user->delete();
        return redirect('users')->with('error',$deletedUser.' is deleted');
    }
}
