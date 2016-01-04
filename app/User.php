<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Post;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['f_name', 'l_name','email', 'password', 'profile_pic'];


	protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];


    public function posts(){
        return $this->hasMany('App\Post')->with('likes', 'comments')->orderBy('id', 'desc');
    }

/*    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function post_likes(){
        return $this->hasMany('App\Post_like');
    }*/

//    public function comment_likes(){
//        return $this->hasMany('App\Comment_like');
//    }

    public function follows(){
        return $this->belongsToMany('App\Follow', 'follow_user','following_user_id', 'follower_user_id');
    }



}
