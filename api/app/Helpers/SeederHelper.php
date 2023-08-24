<?php

namespace App\Helpers;

class SeederHelper
{
    private static $userId;

    public static function setUserId($userId)
    {
        self::$userId = $userId;
    }

    public static function getUserId()
    {
        return self::$userId;
    }
}