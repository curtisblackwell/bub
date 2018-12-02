<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * Diets compatible with the ingredient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diets()
    {
        return $this->belongsToMany(Diet::class, 'diet_lists');
    }
}
