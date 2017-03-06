<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation Menu
    |--------------------------------------------------------------------------
    |
    | The navigation links that run across the top of the Mnara master
    | layout? That's these options right here. Add as many of them as you
    | want to have appear.
    |
    */
    'navigation' => [
        [
            'group' => 'User',
            'class' => 'fa fa-users fa-lg',
            'links' => [
                [
                    'title' => 'Add Role',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'password.email'
                ],
                [
                    'title' => 'List Roles',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'password.request'
                ],

                'separator',

                [
                    'title' => 'Role Matrix',
                    'class' => 'fa fa-fw fa-table',
                    'route' => 'register'
                ]
            ]
        ]
    ],
];