<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected  $fillable = ["membership"];
    protected  $table= "memberships";

      public function user()
      {
          return $this->hasMany(User::class);
      }
}
