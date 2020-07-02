<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function failIfNotExists($record)
    {
        if ($record === null) {
            abort(404);
        }
    }
}
