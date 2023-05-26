<?php

declare(strict_types=1);

namespace Core;

use Exception;
use Throwable;

class BaseException extends Exception
{
    public function __construct(string $message = "Page not found", int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}