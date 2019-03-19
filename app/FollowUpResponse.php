<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * FollowUpResponse Model
 *
 * Used to access the follow up response model
 */
class FollowUpResponse extends Model
{
    /**
     * fu_options()
     *
     * Used to define the relationship between the follow up response and the
     * follow up option.
     */
    public function fu_option() {
        return $this->belongsTo('App\FollowUpOption');
    }
}
