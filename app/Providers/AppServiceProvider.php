<?php

namespace App\Providers;

use App\Models\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

use App\Observers\EventObserver;

class AppServiceProvider extends ServiceProvider
{



    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeExtensions();
        $this->registerValidators();
        $this->registerSingletons();
        $this->registerObservers();
    }

    /**
     * Register the blade extensions
     */
    private function registerBladeExtensions(){
        /**
         *  Laravel 5.3 -> 5.4 dropped support for this function
         *  //telling blade tpl engine to use alt delimiters
         *  \Blade::setContentTags('{[', ']}'); // for variables and all things Blade
         *  \Blade::setRawTags('{[[', ']]}'); // for escaped data
         */

        \Blade::setEchoFormat('nl2br(e(%s))');
    }

    /**
     * Register all custom CDC validators
     */
    private function registerValidators(){

    }

    private function registerSingletons() {

    }

    /**
     * Register all eloquent model observers
     */
    private function registerObservers() {

        Event::observe(EventObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Only register the ide helper in non-prod env.
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
