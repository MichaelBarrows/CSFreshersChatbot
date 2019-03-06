<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUpOption extends Model
{
    public function fu_question() {
        return $this->belongsTo('App\FollowUpQuestion');
    }

    public function fu_responses() {
        return $this->hasMany('App\FollowUpResponse');
    }
}
