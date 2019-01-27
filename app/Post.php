<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Post extends Model  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'text', 'image','created_at','updated_at'];

    public function User(){
        $User = User::where('id',$this->user_id)->first();
        return $User;
    }
    public function likes(){
        return Like::where('post_id',$this->id)->count();
    }
    public function isLike(){
        $like = Like::where('user_id',Auth::user()->id)->where('post_id',$this->id)->first();
        if($like != null)
            return true;
        else
            return false;
    }
}
