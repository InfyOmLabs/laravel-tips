<?php

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $users */
        $users = User::all();
        $faker = \Faker\Factory::create();
        $posts = Post::all();

        $posts->each( function (Post $post) use($faker, $users) {
            for($i = 0; $i < 5;  $i++) {
                $post->comments()->save(new Comment([
                    'user_id' => $users->random()->id,
                    'comment' => $faker->sentence,
                ]));
            }
        });
    }
}
