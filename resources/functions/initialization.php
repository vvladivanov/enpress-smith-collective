<?php
/*
 * Perform Wordpress Initialization Tasks
 */
add_action('init', function(){
    add_theme_support( 'post-thumbnails');
});
