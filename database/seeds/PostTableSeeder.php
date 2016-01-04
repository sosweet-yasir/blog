<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
class PostTableSeeder extends Seeder {

    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $user = User::find($i);
            for ($j = 1; $j <= 5; $j++) {
                Post::create(['title' => 'post'.$j, 'description' => 'description'.$j, 'post_pic' => 'public/pictures/post/pic.jpg', 'user_id' => $user->id]);
            }

        }

    }

}