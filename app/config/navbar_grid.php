<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => 'Tema',   
            'url'   => '',  
            'title' => 'Some title 1'
        ],
        // This is a menu item
        'regions'  => [
            'text'  => 'Regioner',   
            'url'   => 'regions',  
            'title' => 'Some title 1'
        ] ,
        // This is a menu item
        'type'  => [
            'text'  => 'Typografi',   
            'url'   => 'type',  
            'title' => 'Some title 1'
        ]  ,
        // This is a menu item
        'fontawsome'  => [
            'text'  => 'Font Awsome',   
            'url'   => 'fontawsome',  
            'title' => 'Some title 1'
        ] ,
        // This is a menu item
        'source'  => [
            'text'  => 'Källkod',   
            'url'   => 'source',  
            'title' => 'Some title 1'
        ] 
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function($url) {
        if ($url == $this->di->get('request')->getRoute()) {
            return true;
        }
    },

    // Callback to create the urls
    'create_url' => function($url) {
        return $this->di->get('url')->create($url);
    },
];
