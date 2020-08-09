<?php

namespace App\Service\CloudStorage\Folder;

use App\Service\CloudStorage\Storage\GoogleDriveStorage;
use Google_Serivce_Drive_DriveFile;

class GoogleDriveFolder implements FolderInterface
{
    private $service;
    private $path;
    private $rootPath;

    public function __construct(GoogleDriveStorage $storage, string $rootPath)
    {
        $this->service = $storage->getService();
        $this->rootPath = $rootPath;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function create(string $name, ?FolderInterface $parent)
    {
        $parentPath = $parent ? $parent->getPath() : $this->rootPath;

        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $name,
            'mimeType' => 'application/vnd.google-apps.folder',
            'parents' => [$parentPath]
        ]);

        $folder = $this->service->files->create($fileMetadata, ['fields' => 'id']);

        $this->setPath($folder->id);
    }

    public function isExists(): bool
    {
        return ! is_null($this->path);
    }
}
