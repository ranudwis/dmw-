<?php

namespace App\Service\CloudStorage\File;

use App\Service\CloudStorage\Folder\FolderInterface;
use App\Service\CloudStorage\Storage\GoogleDriveStorage;

class GoogleDriveFile implements FileInterface
{
    private $googleDrive;
    private $path;

    public function __construct(GoogleDriveStorage $googleDrive)
    {
        $this->googleDrive = $googleDrive;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function isExists(): bool
    {
        return true;
    }

    public function getPath(): string
    {
        return 'path';
    }

    public function getUrl(): string
    {
        return 'rul';
    }
}
