<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','is_admin','business_name','photo_id','skills','resume_id','post_id','application_id',
    ];

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

    public function is_admin(){
        return $this->is_admin == 1 ? true : false;
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function resume(){
        return $this->belongsTo('App\Resume');
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
    public function application(){
        return $this->hasMany('App\Application');
    }
}
