<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<200; $i++) {
            Post::create([
                'user_id' => random_int(1,50),
                'img_path' => $i%2 == 0 ? 'images/no-image.jpg' : '',
                'heading' => 'Heading-'.$i+1,
                'text' => 'Lorem adka podf aj ja jdopajs d9öa sifjas ojfdoi asjfd',
            ]);
        }
    }
}
