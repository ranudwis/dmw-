<?php

namespace App\Factory;

use App\Service\CloudStorage\File\GoogleDriveFile;
use App\Service\CloudStorage\Storage\GoogleDriveStorage;
use GuzzleHttp\Client;

class GoogleDriveFileFactory
{
    private const RESUMABLE_FILE_UPLOAD_URL = 'https://www.googleapis.com/upload/drive/v3/files?uploadType=resumable';

    private $file;
    private $service;
    private $client;

    public function __construct(GoogleDriveFile $file, GoogleDriveStorage $storage)
    {
        $this->file = $file;
        $this->service = $storage->getService();

        $this->client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $this->service->getClient()->getAccessToken()['access_token']
            ]
        ]);
    }

    public function create(
        string $name,
        int $contentLength,
        string $mime,
        string $parentPath
    ): array {
        $response = $this->client->post(self::RESUMABLE_FILE_UPLOAD_URL, [
            'headers' => [
                'X-Upload-Content-Length' => $contentLength,
                'X-Upload-Content-Type' => $mime,
                'Content-Type' => 'application/json; charset=UTF-8'
            ],

            'json' => [
                'name' => $name,
                'parent' => [$parentPath]
            ],
        ]);

        $contents = json_decode($response->getBody()->getContents());
        $this->file->setPath($contents->id);

        return [
            'url' => $response->getHeader('Location')[0],
            'file' => $this->file
        ];
    }
}
