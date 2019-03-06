<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUpQuestion extends Model
{
    public function question() {
        return $this->belongsTo('App\Question');
    }
    public function fu_options() {
        return $this->hasMany('App\FollowUpOption');
    }
}
