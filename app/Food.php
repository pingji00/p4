<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function categories()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public static function getForDropdown() {
        return self::orderBy('name')->select(['id', 'fat', 'carb', 'protein'])->get();
    }
}
