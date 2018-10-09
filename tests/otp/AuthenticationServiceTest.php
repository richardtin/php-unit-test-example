<?php

namespace Tests\otp;

use App\otp\AuthenticationService;
use App\otp\IProfile;
use App\otp\IToken;
use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    public function testIsValid()
    {
        $target = new AuthenticationService(new StubProfile(), new StubToken());
        $actual = $target->isValid('richard', '91000000');
        $this->assertTrue($actual);
    }
}

class StubProfile implements IProfile
{
    public function getPassword($account)
    {
        if ($account === 'richard') {
            return '91';
        }
        return '';
    }
}

class StubToken implements IToken
{
    public function getRandom($account)
    {
        return '000000';
    }
}