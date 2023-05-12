<?php

declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

function url(string $link = ''): string
{
    return SITE_URL . '/' . $link;
}

#[NoReturn] function redirect(string $path = ''): void
{
    header('Location: ' . url($path));
    exit();
}

function redirectBack(): void
{
    $referer = $_SERVER['HTTP_REFERER'] ?? '/';
    header('Location: ' . $referer);
    exit();
}

function isRoleRoute(): bool
{
    return in_array($_SESSION['account']['role'], explode('/', $_SERVER['REQUEST_URI']));
}
