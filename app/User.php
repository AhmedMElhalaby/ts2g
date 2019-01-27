<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

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
	protected $fillable = ['name', 'email', 'password', 'date_of_birth', 'image', 'cover', 'nationality', 'information','created_at','updated_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function Posts(){
	    $posts = Post::where('user_id',$this->id)->get();
	    return $posts;
    }
    public function CountPosts(){
        $posts = Post::where('user_id',$this->id)->count();
        return $posts;
    }
    public function Friends(){
        $Friends = Friend::where('user_id',$this->id)->get();
        return $Friends;
    }
    public function CountFriends(){
        $Friends = Friend::where('user_id',$this->id)->count();
        return $Friends;
    }
    public function isFriend(){
        $Friend = Friend::where('user_id',Auth::user()->id)->where('friend_id',$this->id)->first();
        if($Friend != null)
            return true;
        else
            return false;
    }
}
