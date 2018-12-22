<?php

namespace Tests\Feature;

use App\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class VariantRecipesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_original_recipe_from_variants()
    {
        // Arrange
        // Create an original and variant recipes.
        $original = factory(Recipe::class)->create();
        $variant  = factory(Recipe::class)->create();
        $variant->original()->associate($original);
        $variant->save();

        // Act
        // Get the original from the variant.
        $retrieved = $variant->original;

        // Assert
        // Ensure the original recipe retrieved.
        $this->assertEquals($original, $retrieved);
    }

    /** @test */
    public function can_get_variant_recipes_from_original()
    {
        // Arrange
        // Create an original and variant recipes.
        $original = factory(Recipe::class)->create();
        $variants = factory(Recipe::class, 2)->create();
        $original->variants()->saveMany($variants);

        // Act
        // Get the variants from the original.
        $retrieved = $original->variants;

        // Assert
        // Ensure the variants match those retrieved.
        $this->assertEquals($variants->map->fresh(), $retrieved);
    }
}
