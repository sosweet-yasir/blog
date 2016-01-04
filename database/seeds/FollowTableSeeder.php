<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Follow;
class FollowTableSeeder extends Seeder {

    public function run()
    {
        for ($x = 1; $x <= 25; $x++) {
            $user = User::find(rand(1, 5));
            $f_user = User::find(rand(6, 10));
            Follow::create(['user_id' => $user->id, 'following_user_id' => $f_user->id]);
        }

    }

}