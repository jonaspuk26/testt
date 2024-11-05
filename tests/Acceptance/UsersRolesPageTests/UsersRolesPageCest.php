<?php

namespace Acceptance\UsersRolesPageTests;

use Pages\UsersRolesPage\UsersRolesPageActions;
use Tests\Support\AcceptanceTester;

class UsersRolesPageCest
{
    private UsersRolesPageActions $usersRolesPage;
    public function _inject(UsersRolesPageActions $usersRolesPage): void
    {
        $this->usersRolesPage = $usersRolesPage;
    }

    public function testAddNewRole(AcceptanceTester $I): void
    {
        $this->usersRolesPage
            ->goToUsersRolesPage($I)
            ->addNewRole($I)
            ->deleteNewRole($I);
    }
}