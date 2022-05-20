<?php

namespace oCooking\Taxonomy;

use oCooking\PostType\RecipePostType;

class RecipeTypeTaxonomy extends Taxonomy {

    const TAXONOMY_KEY = 'recipe_type';
    const TAXONOMY_NAME = 'Recipe Type';
    const POST_TYPE_KEY = RecipePostType::POST_TYPE_KEY;

    const CAPABILITIES =  [
        'manage_terms' => 'manage_recipe_types',
        'edit_terms' => 'edit_recipe_types',
        'delete_terms' => 'delete_recipe_types',
        'assign_terms' => 'assign_recipe_types'
    ];

    const DEFAULT_ROLES_CAPS =  [
        'administrator' => [
            'manage_recipe_types' => true,
            'edit_recipe_types' => true,
            'delete_recipe_types' => true,
            'assign_recipe_types' => true,
        ],
        'contributor' => [
            'manage_recipe_types' => true,
            'edit_recipe_types' => true,
            'delete_recipe_types' => true,
            'assign_recipe_types' => true,
        ]
    ];
}
