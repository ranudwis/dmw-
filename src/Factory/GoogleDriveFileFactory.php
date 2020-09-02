<?php

namespace App\Factory;

use App\Service\CloudStorage\File\GoogleDriveFile;
use App\Service\CloudStorage\Storage\GoogleDriveStorage;
use Google_Service_Drive_DriveFile;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\File\File;

class GoogleDriveFileFactory
{
    private const RESUMABLE_FILE_UPLOAD_URL = 'https://www.googleapis.com/upload/drive/v3/files?uploadType=resumable';

    private $file;
    private $service;

    public function __construct(GoogleDriveFile $file, GoogleDriveStorage $storage)
    {
        $this->file = $file;
        $this->service = $storage->getService();
    }

    public function create(
        File $file,
        string $parentPath,
        string $name
    ): GoogleDriveFile {
        $newFile = new Google_Service_Drive_DriveFile([
            'name' => $name,
            'parents' => [$parentPath],
            'mimeType' => $file->getMImeType()
        ]);

        $fileResource = $this->service->files->create($newFile, [
            'data' => file_get_contents($file->getRealPath()),
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
            'fields' => ['id']
        ]);

        $this->file->setPath($fileResource->getId());

        return $this->file;
    }
}
