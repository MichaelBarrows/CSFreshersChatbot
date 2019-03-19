<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Keyword Model
 *
 * The model that is used to access all keywords.
 */
class Keyword extends Model
{
    // Allows the keyword field to be filled.
    protected $fillable = ['keyword'];

    /**
     * questions()
     *
     * Defines the relationship between the keyword and question models.
     */
    public function questions() {
        return $this->belongsToMany('App\Question');
    }


}
