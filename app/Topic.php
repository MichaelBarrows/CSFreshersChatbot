<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Topic Model
 *
 * Used to access topics.
 */
class Topic extends Model
{
    /**
     * questions()
     *
     * Used to define the relationship between the topic and question models.
     */
    public function questions() {
        return $this->hasMany('App\Question');
    }
}
