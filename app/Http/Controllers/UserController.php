<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use File;
use Image;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('updated_at', 'desc')->paginate(20);
        return view('users/index', compact('users'));
    }
    public function show($id)
    {
        // Only Admins
        $user = User::find($id);
        return view('users/show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $current_user = Auth::user();
        $user = User::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100']
        ]);

        // subir imagen
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            
            $file = $request->file('picture');

            $extension = $file->getClientOriginalExtension();
            $filename = $file->getFilename().'.'.$extension;

            //redimencionar imagem
            $img = Image::make($request->file('picture')->getRealPath());
            $img->fit(400, 400);
            Storage::disk('local')->put($filename,  $img->stream());

            $user->avatar = $filename;
        }
        $record_store = $request->all();
        $user->fill($record_store)->save();
        return redirect()->action('UserController@index');
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
