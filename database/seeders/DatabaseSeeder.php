<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'JohnDoe',
            'email'=> 'John@gmail.com',
        ]);

         listing::factory(6)->create([
            'user_id' => $user->id
         ]);

        // listing::create([
        //         'title' => 'Laravel Senior Developer', 
        //         'tags' => 'laravel, javascript',
        //         'company' => 'Acme Corp',
        //         'location' => 'Boston, MA',
        //         'email' => 'email1@email.com',
        //         'website' => 'https://www.acme.com',
        //         'description' => 'Lorem ipsum dolor sit amet
        //          consectetur adipisicing elit. Ipsam minima 
        //          et illo reprehenderit quas possimus voluptas
        //           repudiandae cum expedita, eveniet aliquid, 
        //           quam illum quaerat consequatur! Expedita 
        //           ab consectetur tenetur delensiti?'
        //   ]);

        //   listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend ,api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.starkindustries.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur
        //      adipisicing elit. Ipsam minima et illo reprehenderit 
        //      quas possimus voluptas repudiandae cum expedita, 
        //      eveniet aliquid, quam illum quaerat consequatur! 
        //      Expedita ab consectetur tenetur delensiti?'
        //   ]);
    }
}
