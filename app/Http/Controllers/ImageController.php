<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function update(Request $request, Workshop $workshop)
    {
        $request->validate([
            'alt'   => ['required', 'string', 'max:150'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        if ($workshop->image_path) {
            Storage::disk('public')->delete($workshop->image_path);
        }

        $workshop->update([
            'image_path' => $request->file('image')->store('images/workshops', 'public'),
        ]);

        return back()->with('success', 'Bild wurde aktualisiert');
    }
}
