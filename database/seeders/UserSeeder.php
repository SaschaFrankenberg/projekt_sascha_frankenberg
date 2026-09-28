<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Erstellt 20 zufällige User
        $users = User::factory(20)->create();

        // Fügt zufälligen Usern einen Organisator hinzu
        $users->random(3)->each(function ($user) {
            $user->update(['role' => 'organizer']);
        });
    }
}
