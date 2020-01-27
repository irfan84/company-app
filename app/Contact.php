<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'company_id',
        'phone',
        'email',
        'type'
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }

}
