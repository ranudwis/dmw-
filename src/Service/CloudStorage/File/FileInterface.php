<?php

namespace App\Service\CloudStorage\File;

use App\Service\CloudStorage\Folder\FolderInterface;

interface FileInterface
{
    public function setPath(string $path);

    public function createFromLocalFile(string $localPath, ?FolderInterface $parent);

    public function isExists(): bool;

    public function getPath(): string;

    public function getUrl(): string;
}
