<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use App\Models\Workshop;
use App\Models\User;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizer = User::where('role', 'organizer')->get();
        $users = User::all();

        // Workshops erstellen mit zufälligem Organisator
        $workshops = Workshop::factory(6)->create([
            'organizer_id' => fn() => $organizer->random()->id,
        ]);

        // Teilnehmer zuweisen
        $workshops->each(function ($workshop) use ($users) {
            $workshop->users()->attach(
                $users->random(5)->pluck('id')
            );
        });
    }
}
