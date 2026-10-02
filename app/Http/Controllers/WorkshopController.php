<?php

namespace App\Http\Controllers;

use App\Http\Requests\Workshop\StoreWorkshopRequest;
use App\Http\Requests\Workshop\UpdateWorkshopRequest;
use App\Notifications\SubscribeWorkshop;
use App\Notifications\UnsubscribeWorkshop;
use App\Notifications\UpdateWorkshop;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workshops = Workshop::withCount(['members'])->get();

        return view('workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('is-organizer');

        $organizer = User::where('role', 'organizer')->get();

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
        $workshop->loadCount(['members']);

        // Checkt ob der Nutzer für den Workshop registriert ist
        $isRegistered = auth()->check() && $workshop->users()->where('user_id', auth()->id())->exists();

        return view('workshops.show', compact('workshop', 'isRegistered'));
    }

    public function register(Workshop $workshop)
    {
        // Id bleibt bestehen
        $workshop->users()->syncWithoutDetaching(auth()->id());

        // Nur die Organisatoren bekommen die Nachricht bei Anmeldung eines Mitgliedes
        $workshop->organizer->notify(new SubscribeWorkshop($workshop, auth()->user()));

        // Wird auf die selbe Seite zurückgeschickt
        return redirect()->back()->with('success', 'Workshop registered successfully.');
    }

    public function unregister(Workshop $workshop)
    {
        $workshop->users()->detach(auth()->id());

        // Nur die Organisatoren bekommen die Nachricht bei Abmeldung eines Mitgliedes
        $workshop->organizer->notify(new UnsubscribeWorkshop($workshop, auth()->user()));

        // Wird auf die selbe Seite zurückgeschickt
        return redirect()->back()->with('success', 'Workshop unregistered successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        Gate::authorize('is-organizer');

        // Wer darf bearbeiten
        $organizers = User::where('role', 'organizer')->get();

        return view('workshops.edit', compact('workshop', 'organizers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkshopRequest $request, Workshop $workshop)
    {
        Gate::authorize('is-organizer');

        $data = $request->validated();
//        dd($request->hasFile('image');
        if ($request->hasFile('image')) {
            if ($workshop->image_path) {
                // Wählt den Speicherort aus und löscht das alte Bild
                Storage::disk('public')->delete($workshop->image_path);
            }
            $data['image_path'] = $request->file('image')->store('images/workshops', 'public');
        }

        // entfernt den Array-Eintrag mit dem Schlüssel image aus $data
        unset($data['image']);

        $workshop->update($data);

        foreach ($workshop->members as $member)
        {
            $member->notify(new UpdateWorkshop($workshop));
        }

        return redirect()
            ->route('workshops.index', $workshop)
            ->with('success', 'Workshop updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        Gate::authorize('is-organizer');

        $workshop->delete();

        return redirect()->route('dashboard')->with('success', 'Workshop deleted successfully.');
    }
}
