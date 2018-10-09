<?php

namespace App\otp;


class ProfileDao
{
    public function getPassword($account)
    {
        return Context::getPassword($account);
    }
}