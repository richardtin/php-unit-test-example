<?php

namespace App\otp;


class Context
{
    public static $profiles = [
        'richard' => '91',
        'steve' => '99',
    ];
    public static function getPassword($key)
    {
        return static::$profiles[$key];
    }
}