<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Event;
use App\Models\Worker;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispatches = Dispatch::with('event','worker')->get();
        return view('dispatches.index',compact('dispatches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        $workers = Worker::all();
        return view('dispatches.create',compact('events','workers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'worker_id' => 'required|exists:workers,id',
            'accepted' => 'required|boolean',
        ]);

        Dispatch::create($validated);

        return redirect()->route('dispatches.index')->with('success','派遣情報が登録されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispatch $dispatch)
    {
        $events = Event::all();
        $workers = Worker::all();

        return view('dispatches.edit',compact('dispatch','events','workers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispatch $dispatch)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'worker_id' => 'required|exists:workers,id',
            'accepted' => 'required|boolean',
        ]);

        $dispatch->update($validated);

        return redirect()->route('dispatches.index')->with('success', '派遣情報が更新されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispatch $dispatch)
    {
        $dispatch->delete();

        return redirect()->route('dispatches.index')->with('success', '派遣情報が削除されました。');
    }
}
