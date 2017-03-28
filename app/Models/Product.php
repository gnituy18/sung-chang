<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'eng_name'];
    public $timestamps = false;
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }

    public function getRouteKeyName()
    {
        return 'eng_name';
    }
}
