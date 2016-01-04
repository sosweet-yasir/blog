<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Post_like;
use App\User;
class Post_likeTableSeeder extends Seeder {

    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $user = User::find($i);
            for ($j = 1; $j <= 5; $j++) {
                $post = Post::find(rand(1, 50));
                Post_like::create(['user_id' => $user->id, 'post_id' => $post->id]);
            }

        }

    }

}