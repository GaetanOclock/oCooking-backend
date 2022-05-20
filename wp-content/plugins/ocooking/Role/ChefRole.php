<?php

namespace oCooking\Role;

class ChefRole extends Role {

    // définition des éléments spécifiques
    const ROLE_KEY = "chef";
    const ROLE_DISPLAY_NAME = "Chef";
    const CAPABILITIES = [
        'read' => true,
        'edit_posts' => true,
        'edit_recipes' => true,
        'publish_recipes' => true,
        'edit_recipe' => true,
        'read_recipe' => true,
        'delete_recipe' => true,
        'edit_others_recipes' => true,
        'delete_others_recipes' => true,
        'delete_published_posts' => true,
        'manage_ingredients' => true,
        'edit_ingredients' => true,
        'delete_ingredients' => true,
        'assign_ingredients' => true,
        'manage_recipe_types' => true,
        'edit_recipe_types' => true,
        'delete_recipe_types' => true,
        'assign_recipe_types' => true,
    ];
}
