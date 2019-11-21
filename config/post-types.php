<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Define following the formatting of the register_post_type() function
    | @link https://codex.wordpress.org/Function_Reference/register_post_type
    |
    | post-type => [Post Type, [arguments,...]]
    |
    */

   'event' => ['Events', ['public' => true, 'show_ui' => true, 'menu_icon' => 'dashicons-calendar-alt']],
   'venue' => ['Venues', ['public' => false, 'show_ui' => false]],
   'apartment' => ['Apartments', [
       'public' => true, 
       'show_ui' => true, 
       'menu_icon' => 'dashicons-building',
       'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => [
            'with_front' => false,
            'slug' => 'apartments',
        ],
        'labels' => [
            'add_new_item' => 'Add New Apartment',
            'edit_item' => 'Edit Apartment',
            'name' => 'Apartments',
            'singular_name' => 'Apartment',
        ],
       ]
    ],
];