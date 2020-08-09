<?php

namespace App\Service\CloudStorage\Folder;

interface FolderInterface
{
    public function setPath(string $path);

    public function getPath(): string;

    public function create(string $name, ?FolderInterface $parent);

    public function isExists(): bool;
}
