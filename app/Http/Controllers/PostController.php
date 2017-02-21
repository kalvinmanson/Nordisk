<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use File;
use Image;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Vote;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function vote($id) {
        $current_user = Auth::user();
        $post = Post::find($id);
        $vote = Vote::where('post_id', $post->id)->where('user_id', $current_user->id)->first();
        if(!isset($vote->id)) {
            //guardar voto
            $store_data = [
                'user_id' => $current_user->id,
                'post_id' => $post->id
            ];
            $vote = Vote::create($store_data);
        }
        $votes = Vote::where('post_id', $post->id)->get()->count();
        return $votes;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($request->q)) {
            $posts = Post::where('name', 'LIKE', '%'.$request->q.'%')->orWhere('content', 'LIKE', '%'.$request->q.'%')->orderBy('created_at', 'desc')->paginate(100);
        } else {
            $posts = Post::orderBy('created_at', 'desc')->paginate(100);
        }
        return view('posts.index', compact('posts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = Auth::user();
        /*
        $this->validate(request(), [
            'name' => ['required', 'min:30']
        ]);*/

        // subir imagen
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            
            $file = $request->file('avatar');

            $extension = $file->getClientOriginalExtension();
            $filename = $file->getFilename().'.'.$extension;

            //redimencionar imagem
            $img = Image::make($request->file('avatar')->getRealPath());
            $img->widen(900);
            Storage::disk('local')->put($filename,  $img->stream());
        }

        $record_store = request()->all();
        if(isset($filename) && !empty($filename)) {
            $record_store['picture'] = $filename;
        }
        $record_store['user_id'] = $current_user->id;
        $post = Post::create($record_store);
        flash('Momento enviado', 'success');
        return redirect()->action('PostController@index');
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
        $current_user = Auth::user();
        $post = Post::find($id);
        if($current_user->id == $post->user->id || $current_user->rol == "Admin") {
            Post::destroy($post->id);
            flash('Mensaje borrado', 'success');
        } else {
            flash('No tiene permisos para eliminar este elemento', 'danger');
        }
        return redirect('posts');
    }      
}