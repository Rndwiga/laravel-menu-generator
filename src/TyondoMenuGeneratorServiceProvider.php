<?php namespace Tyondo\MenuGenerator;


use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Tyondo\MenuGenerator\Helpers\TyondoMenuGeneratorHelper as menuGenerator;
use Tyondo\MenuGenerator\Helpers\TyondoMenuGeneratorHelper;

/**
 * A Laravel 5.3 user package
 *
 * @author: Rndwiga
 */
class TyondoMenuGeneratorServiceProvider extends ServiceProvider {
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * This will be used to register config & view in 
     * your package namespace.
     */
    protected $packageName = 'tyondo_menu_generator';
    /**
     * @var array
     */
    protected $aliases = [
        'GenerateMenu' => 'Tyondo\MenuGenerator\TyondoMenuGenerator',
    ];
    /**
     * Bootstrap the application services.
     * @param mixed
     * @return void
     */
    public function boot()
    {
        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/tyondo_menu_generator.php', $this->packageName);
		// Register Views
        $this->loadViewsFrom(__DIR__.'/Resources/views', $this->packageName);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //registering package service providers and aliases
        $this->registerResources();
        $this->registerAliases();
        $this->app->singleton('GenerateMenu', function()
        {
            return new TyondoMenuGeneratorHelper();
        });


    }
    /**
     * @return void
     */
    protected function registerResources()
    {
        // Publish your config files
        $this->publishes([
            __DIR__.'/Config/tyondo_menu_generator.php' => config_path($this->packageName.'.php')
        ], 'config');
        $this->publishes([
            __DIR__.'/Resources/' => base_path('resources/views/vendor/' . $this->packageName),
        ], 'views');
    }
    /**
     * @return void
     */
    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->aliases as $key => $alias)
        {
            $loader->alias($key, $alias);
        }
    }
}
