<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function topic() {
        return $this->belongsTo('App\Topic');
    }

    public function keywords() {
        return $this->hasMany('App\QuestionKeyword');
    }

    public function answers() {
        return $this->hasMany('App\Answer');
    }

    public function fu_question() {
        return $this->hasOne('App\FollowUpQuestion');
    }
}
