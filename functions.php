<?php

// add dynamic title tag support
function custom_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'custom_theme_support');

// add menus
function custom_menus() {
    $locations = array(
        'primary' => "Locate in header",
        'secondary' => 'Locate in footer'
    );
    register_nav_menus($locations);
}

add_action('init', 'custom_menus');

function custom_register_styles() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ahasbi-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css", array(), '4.6.0', 'all');
    wp_enqueue_style('ahasbi-icon', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css", array(), '1.3.0', 'all');
    wp_enqueue_style('ahasbi-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css", array(), '5.15.2', 'all');
    wp_enqueue_style('ahasbi-gfont', "https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap", array(), 'css2', 'all');
    wp_enqueue_style('ahasbi-custom', get_template_directory_uri() . "/style.css", array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'custom_register_styles');

function custom_registe_scripts() {
    wp_enqueue_script('ahasbi-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '3.5.1', 'all', true);
    wp_enqueue_script('ahasbi-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), '1.16.1', 'all', true);
    wp_enqueue_script('ahasbi-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array(), '4.6.0', 'all', true);
    wp_enqueue_script('ahasbi-javascript',  get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', 'all', true);
}

add_action('wp_enqueue_scripts', 'custom_registe_scripts');

?>
