<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model {
    protected $table = 'users';
    protected $fillable = ['user_id', 'following_user_id'];

//    public function users()
//    {
//        return $this->belongsToMany('App\User', 'follow_user', 'following_user_id', 'following_user_id');
//    }

}
