<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->diffForHumans();
    }

}
