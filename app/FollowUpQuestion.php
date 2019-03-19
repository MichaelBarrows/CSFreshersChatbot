<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * FollowUpQuestion Model
 *
 * Used to access the follow up question model.
 */
class FollowUpQuestion extends Model
{
    /**
     * question()
     *
     * Used to define the relationship between the follow up question and the
     * question models.
     */
    public function question() {
        return $this->belongsTo('App\Question');
    }

    /**
     * fu_options()
     *
     * Used to define the relationship between the follow up question and the
     * follow up options models.
     */
    public function fu_options() {
        return $this->hasMany('App\FollowUpOption');
    }
}
