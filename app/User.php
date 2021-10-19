<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_sei','name_mei','nickname','gender_id','password','email','auth_code', 
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];


    // * パスワードリセット通知の送信をオーバーライド
    // *
    // * @param  string  $token
    // * @return void
    // */
   public function sendPasswordResetNotification($token)
   {
     $this->notify(new PasswordResetNotification($token));
   }

}
