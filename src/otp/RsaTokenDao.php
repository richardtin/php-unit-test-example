<?php

namespace App\otp;


class RsaTokenDao implements IToken
{
    public function getRandom($account)
    {
        return sprintf('%06d', mt_rand(0, 999999));
    }
}