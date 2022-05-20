<?php

namespace oCooking;

/**
 * Plugin Name: oCooking
 */

// on injecte l'autoload de composer
require __DIR__ . '/vendor/autoload.php';

// on stocke le chemin absolu vers ce fichier dans une constante
const OCOOKING_PLUGIN_FILE = __FILE__;

 // on démarre le plugin
Plugin::run();
