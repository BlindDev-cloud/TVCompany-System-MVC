<?php

declare(strict_types=1);

namespace App\Controllers\Producer;

use App\Services\CreateReleaseService;
use App\Validators\CreateReleaseValidator;
use Core\View;

class ReleasesController extends BaseController
{
    public function upload(int $id): void
    {
        View::render('producer/releases/upload', ['order_id' => $id]);
    }

    public function store(): void
    {
        CreateReleaseService::call(($this->fields));

        redirect('producer/orders');
    }
}