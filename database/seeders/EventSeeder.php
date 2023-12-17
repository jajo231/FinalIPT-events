<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $file = file_get_contents('./database/seeders/events.json');
        $data = json_decode($file, true);

        foreach ($data['events'] as $event) {
            Event::create([
                'name' => $event['name'],
                'date' => $event['date'],
                'location' => $event['location'],
                'guest' => $event['guest'],
                'type' => $event['type'],
                'description' => $event['description'],
            ]);
        }
    }
}
