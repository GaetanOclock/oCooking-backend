<?php

namespace oCooking\Taxonomy;

use oCooking\PostType\RecipePostType;

class IngredientTaxonomy extends Taxonomy {

    const TAXONOMY_KEY = 'ingredient';
    const TAXONOMY_NAME = 'Ingredient';
    const POST_TYPE_KEY = RecipePostType::POST_TYPE_KEY;

     const CAPABILITIES =  [
        'manage_terms' => 'manage_ingredients',
        'edit_terms' => 'edit_ingredients',
        'delete_terms' => 'delete_ingredients',
        'assign_terms' => 'assign_ingredients'
    ];

    const DEFAULT_ROLES_CAPS =  [
        'administrator' => [
            'manage_ingredients' => true,
            'edit_ingredients' => true,
            'delete_ingredients' => true,
            'assign_ingredients' => true,
        ],
        'contributor' => [
            'manage_ingredients' => true,
            'edit_ingredients' => true,
            'delete_ingredients' => true,
            'assign_ingredients' => true,
        ]
    ];
}
