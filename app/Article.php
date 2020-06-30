<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }
}
