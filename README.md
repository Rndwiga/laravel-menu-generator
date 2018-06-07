# laravel-menu-generator

### For below laravel 5.5
register the Service provider
Tyondo\MenuGenerator\TyondoMenuGeneratorServiceProvider::class,

The service prover is autoloaded in laravel 5.5
##usage
````
{!! GenerateMenu::generateMenu(config('tyondo_menu_generator.navigation')) !!}
````
or
````
{!! GenerateMenu::generateMenu(config('tyondo_menu_generator.navigation',view.template)) !!}
````
then publish the config file:

````
php artisan vendor:publish
````

###Sample Menu
````
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
````
