<?php

namespace App\Service\CloudStorage\Storage;

use Google_Client;
use Google_Service_Drive;

class GoogleDriveStorage implements StorageInterface
{
    private $service;

    public function __construct(Google_Client $client)
    {
        $this->service = new Google_Service_Drive($client);
    }

    public function getService()
    {
        return $this->service;
    }
}
