<?php

namespace App\otp;

interface IToken
{
    public function getRandom($account);
}