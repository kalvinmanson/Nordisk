<?php

namespace App\Http\Controllers;

use Auth;
use Carbon;
use Illuminate\Http\Request;
use App\Chat;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::groupBy('user_id')->orderBy('created_at', 'desc')->get();
        return view('chats.index', compact('chats'));
    }

    public function show($id)
    {
        $current_user = Auth::user();
        $chats = Chat::where('user_on', $current_user->id)->where('id', '>', $id)->get();
        return $chats->load('user')->toJson();
    }
    public function lastchats($user_id, $last)
    {
        $current_user = Auth::user();
        $chats = Chat::where('user_on', $user_id)->where('id', '>', $last)->get();
        return $chats->load('user')->toJson();
    }
    public function edit($id)
    {
        $chats = Chat::where('user_on', $id)->get();
        return $chats->load('user')->toJson();
    }
    public function store(Request $request)
    {
        $current_user = Auth::user();

        $record_store = request()->all();
        $record_store['user_id'] = $current_user->id;
        if($current_user->rol != 'Admin') {
            $record_store['user_on'] = $current_user->id;
        }
        
        Chat::create($record_store);
    }


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
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    }
}
