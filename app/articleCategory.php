<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articleCategory extends Model
{
    public function articles()
    {
        return $this->hasOne(Article::class);
    }
}
