<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Google_Client;
use Google_Service_Drive;
use League\Flysystem\Filesystem;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('GOOGLE_DMW_REFRESH_TOKEN')) {
            Storage::extend('googledrive', function ($app, $config) {
                $client = new Google_Client();
                $client->setClientId($config['clientId']);
                $client->setClientSecret($config['clientSecret']);
                $client->refreshToken($config['refreshToken']);

                $googleDriveService = new Google_Service_Drive($client);

                $adapter = new GoogleDriveAdapter($googleDriveService, $config['folderId']);

                return new Filesystem($adapter);
            });
        }
    }
}
