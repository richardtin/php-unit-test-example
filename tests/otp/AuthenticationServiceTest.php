<?php

namespace Tests\otp;

use App\otp\AuthenticationService;
use App\otp\IProfile;
use App\otp\IToken;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    private $stubProfile;

    private $stubToken;

    private $target;

    protected function setUp()
    {
        $this->stubProfile = m::mock(IProfile::class);
        $this->stubToken = m::mock(IToken::class);
        $this->target = new AuthenticationService($this->stubProfile, $this->stubToken);
    }

    public function testIsValid()
    {
        $this->givenProfile('richard', '91');
        $this->givenToken('000000');

        $this->shouldBeValid('richard', '91000000');
    }

    private function givenProfile($account, $password): void
    {
        $this->stubProfile->shouldReceive('getPassword')
            ->with($account)
            ->andReturn($password);
    }

    private function givenToken($token): void
    {
        $this->stubToken->shouldReceive('getRandom')
            ->andReturn($token);
    }

    private function shouldBeValid($account, $password): void
    {
        $actual = $this->target->isValid($account, $password);
        $this->assertTrue($actual);
    }
}