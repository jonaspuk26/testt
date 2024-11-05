<?php

namespace Entities\Authentication;

use Tests\Support\ApiTester;

class AuthenticationActions
{
    private AuthenticationParams $authParams;

    public function __construct(AuthenticationParams $authParams)
    {
        $this->authParams = $authParams;
    }

    public function authenticate(ApiTester $I): self
    {
        $I->sendPost(
            $this->authParams->authTokenEndpoint,
            $this->authParams->authPostParams
        );
        $I->seeResponseContains($this->authParams->tokenTypeBearerText);
        $I->amBearerAuthenticated(
            $I->grabDataFromResponseByJsonPath($this->authParams->accessTokenJsonPath)[0]
        );
        $I->haveHttpHeader(
            $this->authParams->httpHeaderVersionName,
            $this->authParams->httpHeaderVersionValue);
        return $this;
    }
}