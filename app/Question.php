<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Question Model
 *
 * Used to access the Question model.
 */
class Question extends Model
{
    /**
     * topic()
     *
     * Used to define the relationship between the question and the topic models.
     */
    public function topic() {
        return $this->belongsTo('App\Topic');
    }

    /**
     * keywords()
     *
     * used to define the relationship between the question and the keyword
     * models.
     */
    public function keywords() {
        return $this->belongsToMany('App\Keyword');
    }

    /**
     * answers()
     *
     * Used to define the relationship between the question and answer models.
     */
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    /**
     * fu_question()
     *
     * Used to define the relationship between the question and follow up
     * question models.
     */
    public function fu_question() {
        return $this->hasOne('App\FollowUpQuestion');
    }
}
