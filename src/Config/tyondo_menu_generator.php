<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation Menu
    |--------------------------------------------------------------------------
    |
    | The navigation links that will be displayed to the user
    |
    */
'navigation' => [
        [
            'type' => 'single',
            'title' => 'Dashboard',
            'class' => 'fa fa-fw fa-home fa-lg',
            'route' => 'gentella.home',
        ],
        [
            'type' => 'group',
            'group' => 'Assessment',
            'class' => 'fa fa-cubes fa-lg',
            'links' => [
                [
                    'title' => 'Personal Information',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'admin.personal.information.index'
                ],
                [
                    'title' => 'Personal Assessment',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'admin.personal.assessment.index'
                ],
                'separator',

                [
                    'title' => 'Training Needs',
                    'class' => 'fa fa-fw fa-table',
                    'route' => 'admin.training.assessment.index'
                ],
            ]
        ],
    ],
];
