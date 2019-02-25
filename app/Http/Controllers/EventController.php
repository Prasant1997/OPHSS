<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events;

use App\Classes;

use Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Events::all()->sortByDesc('id');
        $class = Classes::all();
        return view ('admin.events')->with('events', $event)->with('classes', $class);
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
        $event = new Events;
        $event->event_name = $request->event_name;
        $event->type = $request->type;

        if($request->hasFile('image')){
            $eve = $request->file('image');
            $filename = $eve->getClientOriginalName();
            $location = public_path('images/events/' . $filename);
            Image::make($eve)->save($location);
            $event->image = $filename;
        }

        $event->date = $request->date;
        $event->description = $request->description;
        $event->remarks = $request->remarks;

        $event->save();

        return redirect()->back()->with('success', 'Event Added Successfully !!!');
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
        $event = Events::findOrFail($id);
        $class = Classes::all();
        return view('admin.edit.edit_events')->with('events', $event)->with('classes', $class);
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
        $event = Events::findOrFail($id);
        $event->event_name = $request->event_name;
        $event->type = $request->type;

        if($request->hasFile('image')){
            $eve = $request->file('image');
            $filename = $eve->getClientOriginalName();
            $location = public_path('images/events/' . $filename);
            Image::make($eve)->save($location);
            $event->image = $filename;
        }

        $event->date = $request->date;
        $event->description = $request->description;
        $event->remarks = $request->remarks;

        $event->save();

        return redirect()->route('add_event.index')->with('success', 'Event Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $event = Events::findOrFail($id);
            $file_path = public_path().'/images/events/'.$event->image;
            @unlink($file_path);
            $event->delete();
            return redirect()->back()->with('success', "Event deleted sucessfully!!!");
    }
}
