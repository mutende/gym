<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';
     protected $fillable = ['name'];

    public function classsession()
    {
        return $this->hasMany(ClassSession::class);
    }
}
