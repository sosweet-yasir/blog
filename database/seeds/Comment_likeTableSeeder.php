<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Comment_like;
use App\User;
class Comment_likeTableSeeder extends Seeder {

    public function run()
    {

            for ($j = 1; $j <= 200; $j++) {
                $user = User::find(rand(1, 10));
                $comment = Comment::find($j);
                Comment_like::create(['user_id' => $user->id, 'post_id' => $comment->id]);
            }


    }

}