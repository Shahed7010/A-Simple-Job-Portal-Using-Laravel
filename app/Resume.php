<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $directory = '/document/';
    protected $fillable = ['name'];


    public function getNameAttribute($value)
    {

        return $this->directory . $value;


    }
}
