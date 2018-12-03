<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * Ingredients in recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients()
    {
        return $this
            ->belongsToMany(Ingredient::class, 'ingredient_lists')
            ->withPivot('amount', 'unit');
    }
}
