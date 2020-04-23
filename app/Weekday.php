<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekday extends Model
{
    protected $table = 'weekdays';
    protected $fillable =['day'];

    public function classsession()
    {
        return $this->belongsToMany(ClassSession::class);
    }
}
