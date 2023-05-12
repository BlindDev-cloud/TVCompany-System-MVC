<?php

declare(strict_types=1);

namespace App\Helpers;

class SessionHelper
{
    public static function isLoggedIn(): bool
    {
        return !empty(self::id());
    }

    public static function id(): int|null
    {
        return $_SESSION['account']['id'] ?? null;
    }

    public static function setAccountData(int $id, mixed ...$args): void
    {
        $_SESSION['account'] = array_merge(
            ['id' => $id],
            ...$args
        );
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
        return $sessionData;
    }

    public static function getFlush(string $key): array
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

    public static function isMatchingRole(string $role): bool
    {
        return $_SESSION['account']['role'] === $role;
    }

}