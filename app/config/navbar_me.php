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
            'icon' => 'home',
            'text'  => 'Me',   
            'url'   => '',  
            'title' => 'Some title 1'
        ],
 
        // This is a menu item
        'report'  => [
            'icon' => 'bar-chart',
            'text'  => 'Redovisning',   
            'url'   => 'report',   
            'title' => 'Redovisning'
        ],

        // This is a menu item
        'theme'  => [
            'icon' => 'paint-brush',
            'text'  => 'Tema',   
            'url'   => 'theme',   
            'title' => 'Tema',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'type'  => [
                        'icon' => 'text-height',
                        'text'  => 'Typografi',   
                        'url'   => 'theme/type',  
                        'title' => 'Test av Lydias typografi'
                    ],

                    // This is a menu item of the submenu
                    'regions'  => [
                        'icon' => 'bars',
                        'text'  => 'Alla regioner',   
                        'url'   => 'theme/regions',  
                        'title' => 'Se alla temats regioner'
                    ]

                ],
            ],
        ],
 
        // This is a menu item
        'source' => [
            'icon' => 'code',
            'text'  =>'Källkod', 
            'url'   =>'source',  
            'title' => 'Källkod'
        ],
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
