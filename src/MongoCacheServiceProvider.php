<?php

namespace Nlk\Mongodb\Cache;

use Nlk\Mongodb\Cache\MongoStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class MongoCacheServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving('cache', function($cache)
        {
            $cache->extend('mongodb', function($app)
            {
                $manager = new MongodbCacheManager($app);

                return $manager->driver('mongodb');
            });
        });
    }
}
