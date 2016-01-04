<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
use App\Comment;
class CommentTableSeeder extends Seeder {

    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $user = User::find($i);
            for ($j = 1; $j <= 10; $j++) {
                for($k = 1; $k <= 2; $k++) {
                    $post = Post::find(rand(1, 50));
                    Comment::create(['title' => 'comment' . $j, 'user_id' => $user->id, 'post_id' => $post->id]);
                }
            }

        }

    }

}