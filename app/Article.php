<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function articleCat()
    {
        return $this->belongsTo(articleCategory::class,'category_id');
    }
}
