<?php

namespace Pages\UsersRolesPage;

use Pages\HeaderMenuPage\Header;
use Pages\LoginPage\LoginPageActions;
use Tests\Support\AcceptanceTester;

class UsersRolesPageActions
{
    private UsersRolesPage $usersRolesPage;
    private LoginPageActions $loginPage;
    private Header $header;

    public function __construct(
        UsersRolesPage $usersRolesPage,
        LoginPageActions $loginPage,
        Header $header
    )
    {
        $this->usersRolesPage = $usersRolesPage;
        $this->loginPage = $loginPage;
        $this->header = $header;
    }

    public function goToUsersRolesPage(AcceptanceTester $I): self
    {
        $this->loginPage->login($I);
        $I->waitForElement($this->header->getSelector('usersHeader'));
        $I->click($this->header->getSelector('usersHeader'));
        $I->click($this->header->getSelector('rolesHeaderMenu'));
        $I->seeElement($this->usersRolesPage->getSelector('addNewRoleButton'));
        return $this;
    }

    public function addNewRole(AcceptanceTester $I): self
    {
        $I->waitForElementClickable($this->usersRolesPage->getSelector('generateIdButton'));
        $I->click($this->usersRolesPage->getSelector('generateIdButton'));
        $this->assertGeneratedIdStructure($I);
        $I->fillField(
            $this->usersRolesPage->getSelector('nameField'),
            $this->usersRolesPage->getData('roleName')
        );
        $I->waitForElementClickable($this->usersRolesPage->getSelector('saveRoleButton'));
        $I->click($this->usersRolesPage->getSelector('saveRoleButton'));
        $I->seeElement($this->usersRolesPage->getSelector('roleToastMessage'));
        return $this;
    }

    public function deleteNewRole(AcceptanceTester $I): self
    {
        $I->reloadPage();
        $I->waitForElement($this->usersRolesPage->getSelector('rolesSearchResults'));
        $this->selectRoleFromSearchTab(
            $I,
            $this->usersRolesPage->getData('roleName')
        );
        $I->waitForElementClickable($this->usersRolesPage->getSelector('removeRoleButton'));
        $I->wait(1);
        $I->click($this->usersRolesPage->getSelector('removeRoleButton'));
        $I->waitForElementClickable($this->usersRolesPage->getSelector('confirmRemoveRoleButton'));
        $I->click($this->usersRolesPage->getSelector('confirmRemoveRoleButton'));
        $I->seeElement($this->usersRolesPage->getSelector('roleToastMessage'));
        return $this;
    }

    private function assertGeneratedIdStructure(AcceptanceTester $I): void
    {
        $generatedId = $I->grabValueFrom($this->usersRolesPage->getSelector('idInputField'));
        $I->assertEquals(36, strlen($generatedId));
        $partsOfId = explode('-', $generatedId);
        $I->assertCount(5, $partsOfId);
        $I->assertEquals(8, strlen($partsOfId[0]));
        $I->assertEquals(4, strlen($partsOfId[1]));
        $I->assertEquals(4, strlen($partsOfId[2]));
        $I->assertEquals(4, strlen($partsOfId[3]));
        $I->assertEquals(12, strlen($partsOfId[4]));
    }

    private function selectRoleFromSearchTab(AcceptanceTester $I, string $roleName): void
    {
        $newRole = $I->findSelectorByText(
            $I,
            $this->usersRolesPage->getSelector('rolesSearchResults'),
            $roleName
        );
        $I->click($newRole);
    }
}