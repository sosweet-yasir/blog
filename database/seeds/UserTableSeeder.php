<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class UserTableSeeder extends Seeder {

    public function run()
    {
        for ($x = 1; $x <= 10; $x++) {
            User::create(['f_name' => 'blog',
                'l_name' => 'user'.$x,
                'email' => 'email'.$x.'@bar.com',
                'password' => 'secrete',
                'profile_pic' => 'public/pictures/profile/pic.jpg'
            ]);
        }

    }

}