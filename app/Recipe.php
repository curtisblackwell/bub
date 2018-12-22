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

    /**
     * Recipe this is a variant of.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function original()
    {
        return $this->belongsTo(self::class, 'original_id');
    }

    /**
     * Variant recipes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variants()
    {
        return $this->hasMany(self::class, 'original_id');
    }
}
