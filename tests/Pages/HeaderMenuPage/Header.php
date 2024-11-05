<?php

namespace Pages\HeaderMenuPage;

use Pages\PageObject;

class Header extends PageObject
{
    protected array $selector =
        [
            'headerLogo' => '.logo-container',
            'shopsHeader' => '[title="Shops"]',
            'shopsHeaderMenu' => '[href="/shops//details"]',
            'usersHeader' => '[title="Users"]',
            'rolesHeaderMenu' => '[href="/roles//edit"]',
        ];
}