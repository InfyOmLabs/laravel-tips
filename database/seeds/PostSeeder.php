<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $faker = \Faker\Factory::create();

        $users->each( function (User $user) use($faker) {
            for($i = 0; $i < 5;  $i++) {
                $user->posts()->save(new Post([
                    'title' => $faker->sentence,
                    'body' => $faker->paragraph,
                ]));
            }
        });
    }
}
