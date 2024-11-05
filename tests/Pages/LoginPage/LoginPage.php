<?php

namespace Pages\LoginPage;

use Pages\PageObject;

class LoginPage extends PageObject
{
    protected array $selector =
        [
            'emailField' => 'input[type="email"]',
            'passwordField' => 'input[type="password"]',
            'submitButton' => 'button[type="submit"]',
        ];
}