<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Release;
use App\Validators\CreateReleaseValidator;

class CreateReleaseService
{
    public static function call(array $fields): void
    {
        $validator = new CreateReleaseValidator();

        if(!$validator->validateVideo($_FILES['video'])){
            redirectBack();
        }

        $fields['video'] = UploadFileService::upload($_FILES['video']);

        Release::create($fields);
    }
}