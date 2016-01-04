<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $hidden = ['user_id', 'post_id', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'post_id', 'user_id'];


    public function users()
    {
        return $this->belongsTo('App\User')->select(['f_name', 'l_name', 'email']);
    }

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }

    public function comment_likes(){
        return $this->hasMany('App\Comment_like');
    }

}
