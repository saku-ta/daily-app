<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider{
    public function boot(){
        Paginator::useBootstrap();
        
        URL::forceScheme('Https');
        $this->app['request']->server->set('HTTPS','on');
        
        
    }
}
