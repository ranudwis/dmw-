<?php

namespace App\Service\CloudStorage\Folder;

use App\Service\CloudStorage\Storage\GoogleDriveStorage;
use Google_Service_Drive_DriveFile;
use Google_Service_Exception;

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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function create(string $name, ?FolderInterface $parent = null)
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
        if (is_null($this->getPath())) {
            return false;
        }

        try {
            $file = $this->service->files->get($this->getPath(), ['fields' => 'id,trashed']);
        } catch (Google_Service_Exception $e) {
            return false;
        }

        if ($file->id && ! $file->trashed) {
            return true;
        }

        return false;
    }
}
