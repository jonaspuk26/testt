<?php

namespace Entities\Authentication;
class AuthenticationParams
{
    public string $authTokenEndpoint = '/auth/token';
    public string $tokenTypeBearerText = '"token_type":"Bearer"';
    public string $accessTokenJsonPath = '$.access_token';
    public string $httpHeaderVersionName = 'wm-api-version';
    public string $httpHeaderVersionValue = 'latest';
    public array $authPostParams =[];

    public function __construct()
    {
        $this->authPostParams =
        [
            'grant_type' => 'password',
            'client_id' => $_ENV['CLIENT_ID'],
            'client_secret' => $_ENV['CLIENT_SECRET'],
            'scope' => $_ENV['SCOPE'],
            'username' => $_ENV['USERNAME'],
            'password' => $_ENV['PASSWORD']
        ];
    }

}