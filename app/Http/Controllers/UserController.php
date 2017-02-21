<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use File;
use Image;
use Hash;
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
        // Cambiar password
        if (isset($request->old_password) && Hash::check($request->old_password, $user->password)) {
            $this->validate(request(), [
                'old_password' => 'required|min:6',
                'password' => 'required|min:3|confirmed',
                'password_confirmation' => 'required|min:3'
            ]);
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            flash('Contraseña actualizada', 'success');
            return redirect()->action('UserController@show', $user->id);
        }

        $record_store = $request->all();
        $user->fill($record_store)->save();
        flash('Perfil actualizado', 'success');
        return redirect()->action('UserController@show', $user->id);
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
