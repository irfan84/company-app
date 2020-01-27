<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address'
    ];

    public function contacts(){
        return $this->hasMany('App\Contact');
    }
}
