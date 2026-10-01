<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Workshop>
 */
class WorkshopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $templates = [
            [
                'name' => 'Einführung in die Astronomie',
                'description' => 'Ein Überblick über unser Sonnensystem, die Sterne und wie man den Nachthimmel mit bloßem Auge liest. Kein Vorwissen nötig.',
                'location' => 'Vereinsheim, großer Saal',
            ],
            [
                'name' => 'Teleskop-Workshop',
                'description' => 'Wie funktioniert ein Teleskop, wie stellt man es richtig ein und worauf sollte man beim Kauf achten? Mit praktischer Übung vor Ort.',
                'location' => 'Vereinsparkplatz (bei klarem Himmel)',
            ],
            [
                'name' => 'Reise durch das Sonnensystem',
                'description' => 'Von der Sonne bis zum Kuipergürtel: Wir besprechen die Planeten, ihre Monde und was sie so einzigartig macht.',
                'location' => 'Vereinsheim, Raum 2',
            ],
            [
                'name' => 'Sternbilder erkennen',
                'description' => 'Wie man sich am Nachthimmel orientiert und die wichtigsten Sternbilder findet, inklusive kleiner Himmelsführung im Freien.',
                'location' => 'Treffpunkt: Vereinsparkplatz',
            ],
            [
                'name' => 'Physik des Weltalls',
                'description' => 'Schwarze Löcher, Gravitation und die Entstehung des Universums verständlich erklärt, ganz ohne komplizierte Formeln.',
                'location' => 'Vereinsheim, großer Saal',
            ],
            [
                'name' => 'Raumfahrt-Geschichte',
                'description' => 'Von den ersten Raketen bis zur Internationalen Raumstation: ein spannender Rückblick auf die Meilensteine der Raumfahrt.',
                'location' => 'Vereinsheim, Raum 2',
            ],
        ];

        $template = $this->faker->unique()->randomElement($templates);

        return [
            'name' => $template['name'],
            'description' => $template['description'],
            'location' => $template['location'],
            'date' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'time' => $this->faker->randomElement(['18:00', '19:00', '19:30', '20:00']),
            'organizer_id' => User::where('role', 'organizer')->inRandomOrder()->first()?->id
                ?? User::factory()->create(['role' => 'organizer'])->id,
        ];
    }
}
