<?php

namespace App\otp;

interface IProfile
{
    public function getPassword($account);
}