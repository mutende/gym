<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{

    protected  $table = "class_sessions";
    protected  $fillable = ["name","duration","description"];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function weekday()
    {
        return $this->belongsTo(Weekday::class, 'day_id');
    }
}
