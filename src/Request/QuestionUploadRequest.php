<?php

namespace App\Request;

use App\Service\Validator;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraints as Assert;

class QuestionUploadRequest
{
    /**
     * @Assert\NotNull(message="notnull:file")
     * @Assert\File(mimeTypes="application/pdf", mimeTypesMessage="mime:file")
     */
    private $file;

    public function __construct(RequestStack $requestStack, Validator $validator)
    {
        $request = $requestStack->getCurrentRequest();

        $this->file = $request->files->get('file');

        $validator->validate($this);
    }

    public function getFile()
    {
        return $this->file;
    }
}
