<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $directory = '/images/';
    public static $thumbnail = '/images/user_thumbnail.jpg';
    protected $fillable = ['name'];


    public function getNameAttribute($value)
    {

        return $this->directory . $value;


    }
}
