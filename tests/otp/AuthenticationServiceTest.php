<?php

namespace Tests\otp;

use App\otp\AuthenticationService;
use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    /** @test */
    public function is_valid_test()
    {
        $target = new AuthenticationService();
        $actual = $target->isValid('richard', '91000000');
        //always failed
        $this->assertTrue($actual);
    }
}
