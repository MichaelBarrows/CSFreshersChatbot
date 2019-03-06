<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUpResponse extends Model
{
    public function fu_option() {
        return $this->belongsTo('App\FollowUpOption');
    }
}
