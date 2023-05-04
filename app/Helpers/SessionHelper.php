<?php

declare(strict_types=1);

namespace App\Helpers;

class SessionHelper
{
    public static function isLoggedIn(): bool
    {
        return !empty($_SESSION['account_id']);
    }

    public static function id(): int|null
    {
        return $_SESSION['account_id'] ?? null;
    }

    public static function setAccount(int $id): void
    {
        $_SESSION['account_id'] = $id;
    }

    public static function setAlert(string $key, string $type, string $message): void
    {
        $_SESSION['alerts'][$key] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public static function setFormData(array $data): void
    {
        $_SESSION['data'] = $data;
    }

    public static function get(string $key): array
    {
        $sessionData = !empty($_SESSION[$key]) ? $_SESSION[$key] : [];
        self::flush($key);
        return $sessionData;
    }

    private static function flush(string $key): void
    {
        $_SESSION[$key] = [];
    }

    public static function hasAlerts(): bool
    {
        return !empty($_SESSION['alerts']);
    }

    public static function destroy(): void
    {
        if (session_id()) {
            session_destroy();
        }
    }

}