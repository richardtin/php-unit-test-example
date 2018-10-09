<?php

namespace App\otp;


class AuthenticationService
{
    /**
     * @var IProfile
     */
    private $profile;

    /**
     * @var IToken
     */
    private $token;

    /**
     * AuthenticationService constructor.
     * @param IProfile $profile
     * @param IToken $token
     */
    public function __construct(IProfile $profile = null, IToken $token = null)
    {
        $this->profile = $profile ?: new ProfileDao();
        $this->token = $token ?: new RsaTokenDao();
    }

    public function isValid($account, $password)
    {
        // 根據 account 取得自訂密碼
        $passwordFromDao = $this->profile->getPassword($account);
        // 根據 account 取得 RSA token 目前的亂數
        $randomCode = $this->token->getRandom($account);

        var_dump($randomCode);

        // 驗證傳入的 password 是否等於自訂密碼 + RSA token亂數
        $validPassword = $passwordFromDao . $randomCode;
        $isValid = $password === $validPassword;

        if ($isValid) {
            return true;
        } else {
            return false;
        }
    }
}