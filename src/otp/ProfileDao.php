<?php

namespace App\otp;


class ProfileDao implements IProfile
{
    public function getPassword($account)
    {
        return Context::getPassword($account);
    }
}