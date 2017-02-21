<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $current_user = Auth::user();
        $record_store = request()->all();
        $record_store['user_id'] = $current_user->id;
        $record_store['name'] = nl2br(strip_tags($record_store['name']));
        $comment = Comment::create($record_store);
        return $comment->load('user')->toJson();
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
