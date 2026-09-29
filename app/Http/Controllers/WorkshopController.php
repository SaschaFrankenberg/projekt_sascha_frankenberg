<?php

namespace App\Http\Controllers;

use App\Http\Requests\Workshop\StoreWorkshopRequest;
use App\Http\Requests\Workshop\UpdateWorkshopRequest;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workshops = Workshop::with(['organizer', 'users'])->get();

        return view('workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('is-Organizer');
//        $organizer = User::where('role', 'organizer')->get();
        return view('workshops.create', compact('organizer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkshopRequest $request)
    {
        Workshop::create($request->validated());

        return redirect()
            ->route('workshops.index')
            ->with('success', 'Workshop created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        $workshop->load(['organizer', 'users']);
        $isRegistered = auth()->check() && $workshop->users()->where('user_id', auth()->id())->exists();

        return view('workshops.show', compact('workshop', 'isRegistered'));
    }

    public function register(Workshop $workshop)
    {
        $workshop->users()->syncWithoutDetaching(auth()->id());

        return redirect()->back()->with('success', 'Workshop registered successfully.');
    }

    public function unregister(Workshop $workshop)
    {
        $workshop->users()->detach(auth()->id());

        return redirect()->back()->with('success', 'Workshop unregistered successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
//        Gate::authorize('is-Organizer');
        $organizers = User::where('role', 'organizer')->get();
        return view('workshops.edit', compact('workshop', 'organizers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkshopRequest $request, Workshop $workshop)
    {
//        Gate::authorize('is-Organizer');
        $workshop->update($request->validated());

        return redirect()
            ->route('workshops.show', $workshop)
            ->with('success', 'Workshop updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
//        Gate::authorize('is-Organizer');
        $workshop->delete();
        return redirect()->route('dashboard')->with('success', 'Workshop deleted successfully.');
    }
}
