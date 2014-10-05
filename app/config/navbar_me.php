<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',

    // We only want to show two levels in the top navigation
    'maxDepth' => 2,
 
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

         'users' => [
            'icon' => 'users',
            'text' => 'Användare',
            'url' => 'users',
            'title' => 'Test av användare och CForm',
            'submenu' => [
                'items' => [
                    'add' => [
                        'text' => 'Lägg till',
                        'url' => 'users/add',
                        'title' => 'Lägg till en användare'
                    ],
                    'list' => [
                        'text' => 'Lista alla',
                        'url' => 'users/list',
                        'title' => 'Lista alla användare'
                    ],
                    'active' => [
                        'text' => 'Lista aktiva',
                        'url' => 'users/active',
                        'title' => 'Lista aktiva användare'
                    ],
                    'inactive' => [
                        'text' => 'Lista inaktiva',
                        'url' => 'users/inactive',
                        'title' => 'Lista inaktiva användare'
                    ],
                    

                     'separator0' => '--',

                    'deleted' => [
                        'text' => 'Lista borttagna användare',
                        'url' => 'users/trashcan',
                        'title' => 'Lista raderade användare'
                    ],
                    
                    'delete' => [
                        'text' => 'Ta bort användare',
                        'url' => 'users/delete',
                        'title' => 'Ta bort en användare'
                    ],

                     'restore' => [
                        'text' => 'Återställ användare',
                        'url' => 'users/restore',
                        'title' => 'Återställ en raderad användare'
                    ],


                    'separator1' => '--',

                    'deactivate' => [
                        'text' => 'Inaktivera',
                        'url' => 'users/deactivate',
                        'title' => 'Inaktivera en användare'
                    ],

                    'activate' => [
                        'text' => 'Aktivera en användare',
                        'url' => 'users/activate',
                        'title' => 'Aktivera en inaktiv användare'
                    ],

                    'separator2' => '--',

                    'setup' => [
                        'text' => 'Återställ databas',
                        'url' => 'users/setup',
                        'title' => 'Återställ användartabellen'
                    ]
                ]
            ]
        ],

         // This is a menu item
        'test' => [
            'icon' => 'puzzle-piece',
            'text'  =>'Test', 
            'url'   =>'test',  
            'title' => 'Blandade tester',
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'cform'  => [
                        'icon' => 'book',
                        'text'  => 'CForm',   
                        'url'   => 'test/cform',  
                        'title' => 'Test av CForm',
                        'submenu' => [
                            'items' => [
                                'test-as-array' => [
                                    'text' => 'As array',
                                    'url' => 'test/cform/array',
                                    'title' => 'CForm test-as-array'
                                ],
                                'test-checkbox' => [
                                    'text' => 'Checkbox',
                                    'url' => 'test/cform/checkbox',
                                    'title' => ''
                                ],
                                'creditcard' => [
                                    'text' => 'Creditcard checkout',
                                    'url' => 'test/cform/creditcard',
                                    'title' => ''
                                ],
                                'multicheckbox' => [
                                    'text' => 'Multiple checkboxes',
                                    'url' => 'test/cform/multicheckbox',
                                    'title' => ''
                                ],
                                'test1' => [
                                    'text' => 'Test 1',
                                    'url' => 'test/cform/test1',
                                    'title' => ''
                                ],
                                'test2' => [
                                    'text' => 'Test 2',
                                    'url' => 'test/cform/test2',
                                    'title' => ''
                                ],
                                'test3' => [
                                    'text' => 'Test 3',
                                    'url' => 'test/cform/test3',
                                    'title' => ''
                                ],
                                'test4' => [
                                    'text' => 'Test 4',
                                    'url' => 'test/cform/test4',
                                    'title' => ''
                                ],
                                'test5' => [
                                    'text' => 'Test 5',
                                    'url' => 'test/cform/test5',
                                    'title' => ''
                                ],
                                'test6' => [
                                    'text' => 'Test 6',
                                    'url' => 'test/cform/test6',
                                    'title' => ''
                                ],
                                'validation' => [
                                    'text' => 'Validation',
                                    'url' => 'test/cform/validation',
                                    'title' => ''
                                ]
                            ]
                        ]
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

       // echo $url . " === " . $this->di->get('request')->getRoute() . "<br>";

        if ( $url == $this->di->get('request')->getRoute()) {
            return true; 
        } else if($url && strpos($this->di->get('request')->getRoute(), $url) === 0) {
            return true;
        }
    },

    // Callback to create the urls
    'create_url' => function($url) {
        return $this->di->get('url')->create($url);
    },
];
