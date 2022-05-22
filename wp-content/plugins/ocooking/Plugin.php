<?php

namespace oCooking;

use oCooking\PostType\RecipePostType;
use oCooking\Role\ChefRole;
use oCooking\Taxonomy\IngredientTaxonomy;
use oCooking\Taxonomy\RecipeTypeTaxonomy;
use oCooking\User\Register;

class Plugin {
    /**
     * Entry method
     *
     * @return void
     */
    static public function run()
    {
        // on accroche une méthode pour gérer l'init
        add_action('init', [self::class, 'onInit']);
        // idem pour l'activation du plugin
        register_activation_hook(
            OCOOKING_PLUGIN_FILE,
            [self::class, 'onPluginActivation'] // la méthode à déclencher à l'activation du plugin
        );
        // idem pour la désactivation du plugin
        register_deactivation_hook(
            OCOOKING_PLUGIN_FILE,
            [self::class, 'onPluginDeactivation'] // la méthode à déclencher à la désactivation du plugin
        );

        // à l'init de l'api REST
        add_action( 'rest_api_init', [self::class, 'onRestInit']);

        add_action( 'rest_api_init', function () {
  register_rest_route( 'myplugin/v1', '/author/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'my_awesome_func',
  ) );
} );
    }

    /**
     * onInit()
     * Regroups all the actions to perform on WordPress init hook 
     *
     * @return void
     */
    static public function onInit()
    {
        // lancer la déclaration des CPT
        RecipePostType::register();
        // lancer la déclaration des Taxonomies
        IngredientTaxonomy::register();
        RecipeTypeTaxonomy::register();
        // lancer la déclaration des Rôles
    }
    
    static public function onRestInit()
    {
        remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
        add_filter( 'rest_pre_serve_request', [self::class, 'setupCors']);
        Register::initRoute();
    }

    static public function setupCors()
    {
        header( 'Access-Control-Allow-Origin: *' );
        // header( 'Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE,OPTIONS' );
        // header( 'Access-Control-Allow-Credentials: true' );
    }

    /**
     * onPluginActivation()
     * Actions to perform on plugin activation
     *
     * @return void
     */
    static public function onPluginActivation()
    {
        // déclaration des rôles custom
        ChefRole::register();
        // associer les caps custom de nos CPT et CT à l'admin
        RecipePostType::addCaps();
        IngredientTaxonomy::addCaps();
        RecipeTypeTaxonomy::addCaps();
    }
    
    /**
     * onPluginDeactivation()
     * Actions to perform on plugin deactivation
     *
     * @return void
     */
    static public function onPluginDeactivation()
    {
        // on retire les rôles custom
        ChefRole::unregister();
        // Dissocier les caps custom de nos CPT et CT de l'admin
        RecipePostType::removeCaps();
        IngredientTaxonomy::removeCaps();
        RecipeTypeTaxonomy::removeCaps();
    }
}
