<?php

namespace App\Validators;

class CreateReleaseValidator extends Base\BaseValidator
{
    protected array $allowedMimes = [
        'video/mp4',
        'video/quicktime'
    ];

    public function validateVideo(array $file): bool
    {
        if(!is_uploaded_file($file['tmp_name'])){
            SessionHelper::setAlert('video', 'danger', 'Video has not been uploaded');
            return false;
        }

        if(!in_array($file['type'], $this->allowedMimes)){
            SessionHelper::setAlert('video', 'danger', 'File format not allowed');
            return false;
        }

        return true;
    }
}