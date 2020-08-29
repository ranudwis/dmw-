<?php

namespace App\Tests\Traits;

use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileTrait
{
    protected function createUploadedImage()
    {
        return $this->createUploadedTestFile('image.png', 'image/png');
    }

    protected function createUploadedPdf()
    {
        return $this->createUploadedTestFile('document.pdf', 'application/pdf');
    }

    protected function createUploadedTestFile(string $filename, string $mime): UploadedFile
    {
        $temporaryFileName = tempnam(sys_get_temp_dir(), 'dmwplusplus');
        copy(__DIR__ . '/../fixtures/' . $filename, $temporaryFileName);

        return new UploadedFile(
            $temporaryFileName,
            $filename,
            $mime
        );
    }
}
