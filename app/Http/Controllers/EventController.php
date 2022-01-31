<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index (){
        $search = request('search');

        if($search){
            $events = Event::where([['title','like','%'.$search.'%']])->get();
        } else {
            $events=Event::all();
        }
        return view('welcome', ['events'=> $events,'search'=>$search]);
        }
    
    public function create(){
        return view('events.create');
    }
    public function store(Request $request){
        $event = new Event;
        $event->title = $request->title;

        $event->city = $request->city;

        $event->private = $request->private;

        $event->description = $request->description;

        $event->items = $request->items;

        $event->date = $request->date;

        $event->datep = $request->datep;


        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image= $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg','Serviço criado com sucesso!');
    }
    public function show($id){
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show',['event'=>$event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard() {
        $user = auth()->user();
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id) {
        Event::findOrfail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Serviço foi excluido agora que foi Completo');
    }

    public function edit(Request $request, Event $event) {
        if (Gate::allows('autorizado', $event)) {
            return view('events.edit', ['event' => $event]);
        } 
    //    $event = Event::findOrfail($id);
        //return view('events.edit', ['event' => $event]);
        return back()->with('msg', 'Não autorizado');
    }

    public function update(Request $request, Event $event) {
        $data = $request->all();
        
        Gate::authorize('autorizado', $event);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $data['image']= $imageName;
        }
        //dd($request->event_id);
        //Event::findOrfail($request->id)->update($data());
        $event->update($data);

        return redirect('/dashboard')->with('msg', 'Serviço Foi Editado Com Sucesso');

    }
}

