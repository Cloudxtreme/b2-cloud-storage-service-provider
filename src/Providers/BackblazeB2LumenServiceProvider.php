<?php

namespace Insanekitty\BackblazeB2\Providers;

use League\Flysystem\Filesystem;
use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Insanekitty\BackblazeB2\Client as BackblazeB2Client;
use Insanekitty\Flysystem\BackblazeB2\BackblazeB2Adapter;

class BackblazeB2LumenServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->configure('filesystems');

        if (null === ($filesystems = $this->app['config']->get('filesystems'))) {
            throw new \RunTimeException('Unable to load the B2 Backblaze Cloud Storage config.');
        }

        $config = include __DIR__ . '/../Config/config.php';
        $this->app['config']->set([
            'filesystems.disks' => array_merge($filesystems['disks'], $config['disks'])
        ]);

        Storage::extend('b2', function ($app, $config) {
            $client = new BackblazeB2Client(
                $config['id'],
                $config['app'],
                $config['bucket']
            );
            return new Filesystem(new BackblazeB2Adapter($client, $config['bucket']));
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
