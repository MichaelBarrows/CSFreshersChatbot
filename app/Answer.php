<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Answer Model
 *
 * The model that is used to access answers.
 */
class Answer extends Model
{
    /**
     * question()
     *
     * Defines the relationship between the answer and question models.
     */
    public function question() {
        return $this->belongsTo('App\Question');
    }
}
