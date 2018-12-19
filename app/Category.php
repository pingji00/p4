<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function foods()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Food')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $categories = self::orderBy('name') -> get();

        $categoriesForCheckboxes = [];

        foreach ($categories as $category) {
            $categoriesForCheckboxes[$category['id']] = $category->name;
        }

        return $categoriesForCheckboxes;
    }

}
