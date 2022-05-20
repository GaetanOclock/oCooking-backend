<?php

namespace oCooking\PostType;

// cette classe récupère toutes les méthodes et propriétés (public et protected) de la classe parente
class RecipePostType extends PostType {

    // ici, dans la classe fille, on définit les données qui sont spécifiques à ce CPT
    const POST_TYPE_KEY = 'recipes';
    const POST_TYPE_LABEL = 'Recipes';
    const POST_TYPE_SLUG = 'recettes';

    const CAPABILITIES = [
        // [cap par défaut, existante dans WP] => [cap custom qui correpond à la même action mais pour ce CPT distinct]
        'edit_posts' => 'edit_recipes', // on décide du nom de la capability à associer au comportement par défaut "edit_posts"
        'publish_posts' => 'publish_recipes',
        'edit_post' => 'edit_recipe',
        'read_post' => 'read_recipe',
        'delete_post' => 'delete_recipe',
        'edit_others_posts' => 'edit_others_recipes',
        'delete_others_posts' =>  'delete_others_recipes', // la notion "others" s'appuie sur l'auteur du post, il faut donc que ce CPT déclare le support de la feature "author"
        'delete_published_posts' => 'delete_published_recipes',
    ];

    // la liste des custom caps pour ce CPT que je veux associer à l'administrateur
    const DEFAULT_ROLES_CAPS = [
        'administrator' => [
            'edit_recipes' => true, 
            'publish_recipes' => true,
            'edit_recipe' => true,
            'read_recipe' => true,
            'delete_recipe' => true,
            'edit_others_recipes' => true,
            'delete_others_recipes' => true,
        ],
        'contributor' => [
            'edit_recipes' => true, 
            'publish_recipes' => false,
            'edit_recipe' => true,
            'read_recipe' => true,
            'delete_recipe' => true,
            'edit_others_recipes' => false,
            'delete_others_recipes' => false,
        ]
    ];
}
