<?php

namespace benk007\Filters;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('multiselect-filter', __DIR__.'/../dist/js/filter.js');
            Nova::style('multiselect-filter', __DIR__ . '/../dist/css/field.css');
        });
    }
}
