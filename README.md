# laravel-registration-confirmation

### For below laravel 5.5
register the Service provider
Tyondo\MenuGenerator\TyondoMenuGeneratorServiceProvider::class,

The service prover is autoloaded in laravel 5.5
##usage
{!! menuGenerator::generateMenu(named.routes) !!}

or

{!! menuGenerator::generateMenu(named.routes, view.template) !!}