<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    /**
     * Ingredients compatible with diet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'diet_lists');
    }
}
