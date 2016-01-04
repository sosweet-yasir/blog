<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_like extends Model {
    protected $hidden = ['user_id', 'comment_id', 'created_at', 'updated_at'];

    protected $fillable = ['post_id', 'user_id'];

    public function users()
    {
        return $this->belongsTo('App\User')->select(['f_name', 'l_name', 'email']);
    }

    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }

}
