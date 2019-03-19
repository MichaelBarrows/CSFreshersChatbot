<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * FollowUpOption Model
 *
 * Used to access the follow up options.
 */
class FollowUpOption extends Model
{
    /**
     * fu_question()
     *
     * Used to define the relationship between the follow up option and the
     * follow up question models.
     */
    public function fu_question() {
        return $this->belongsTo('App\FollowUpQuestion');
    }

    /**
     * fu_responses()
     *
     * Used to define the relationship between the follow up option and the
     * follow up responses models.
     */
    public function fu_responses() {
        return $this->hasMany('App\FollowUpResponse');
    }
}
