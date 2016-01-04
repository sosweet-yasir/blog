<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model {
    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    protected $fillable = ['title', 'description', 'post_pic', 'user_id'];

    public function users()
    {
        return $this->belongsTo('App\User')->select(['f_name', 'l_name', 'email']);
    }

    public function comments(){
        return $this->hasMany('App\Comment')->with('comment_likes');
    }

    public function likes(){
        return $this->hasMany('App\Post_like');
    }

}
