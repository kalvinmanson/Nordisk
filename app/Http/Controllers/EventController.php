<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use File;
use Image;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Vote;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function vote($id, $rank) {
        $current_user = Auth::user();
        $event = Event::find($id);
        $vote = Vote::where('event_id', $event->id)->where('user_id', $current_user->id)->first();
        if(!isset($vote->id)) {
            //guardar rank
            $event->rank = ($event->rank + $rank) / 2;
            $event->save();
            //guardar voto
            $store_data = [
                'user_id' => $current_user->id,
                'event_id' => $event->id
            ];
            $vote = Vote::create($store_data);
            return $event->rank;
        } else {
            return $event->rank;
        }
    }
    public function duplicate(Request $request) {
        $event = Event::find($request->id);
        $newPage = $event->replicate();
        $newPage->slug = $newPage->slug .'-copy'; 
        $newPage->save();

        return redirect()->action('EventController@edit', $newPage->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->q)) {
            $events = Event::where('name', 'LIKE', '%'.$request->q.'%')->orWhere('content', 'LIKE', '%'.$request->q.'%')->orderBy('startdate', 'asc')->paginate(100);
        } else {
            $events = Event::orderBy('startdate', 'asc')->paginate(50);
        }
        //listado de ponentes
        $users = User::where('rol', 'Admin')->get();
        return view('events/index', compact('events', 'users'));
    }

    public function store(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $this->validate(request(), [
            'name' => ['required', 'max:100']
        ]);

        $record_store = request()->all();
        $event = Event::create($record_store);
        return redirect()->action('EventController@edit', $event->id);
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events/show', compact('event'));
    }

    public function edit($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $event = Event::find($id);
        $users = User::where('rol', 'Admin')->get();
        return view('events/edit', compact('event', 'users'));
    }
    public function update(Request $request, $id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $event = Event::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100']
        ]);

        // subir imagen
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            
            $file = $request->file('avatar');

            $extension = $file->getClientOriginalExtension();
            $filename = $file->getFilename().'.'.$extension;

            //redimencionar imagem
            $img = Image::make($request->file('avatar')->getRealPath());
            $img->fit(1200, 450);
            Storage::disk('local')->put($filename,  $img->stream());
            

            $event->picture = $filename;
        }
        $record_store = $request->all();
        $event->fill($record_store)->save();
        return redirect()->action('EventController@index');
    }
    public function destroy($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        $event = Event::find($id);
        Event::destroy($event->id);
        return redirect()->action('EventController@index');
    }
}
