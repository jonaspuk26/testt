<?php

namespace Pages\ShopsPage;

use Pages\HeaderMenuPage\Header;
use Pages\LoginPage\LoginPageActions;
use Tests\Support\AcceptanceTester;

class ShopsPageActions
{
    private Header $header;
    private ShopsPage $shopsPage;
    private LoginPageActions $loginPage;

    public function __construct(
        Header           $header,
        ShopsPage        $shopsPage,
        LoginPageActions $loginPage
    )
    {
        $this->header = $header;
        $this->shopsPage = $shopsPage;
        $this->loginPage = $loginPage;
    }

    public function goToShopsPage(AcceptanceTester $I): self
    {
        $this->loginPage->login($I);
        $I->waitForElement($this->header->getSelector('shopsHeader'));
        $I->click($this->header->getSelector('shopsHeader'));
        $I->click($this->header->getSelector('shopsHeaderMenu'));
        $I->seeElement($this->shopsPage->getSelector('addNewShopButton'));
        return $this;
    }

    public function addNewShop(AcceptanceTester $I): self
    {
        $I->fillField(
            $this->shopsPage->getSelector('shopNameField'),
            $this->shopsPage->getData('shopName'));
        $I->fillField(
            $this->shopsPage->getSelector('descriptionField'),
            $this->shopsPage->getData('description'));
        $I->fillField(
            $this->shopsPage->getSelector('receiptHeaderField'),
            $this->shopsPage->getData('receiptHeader'));
        $I->fillField(
            $this->shopsPage->getSelector('receiptFooterField'),
            $this->shopsPage->getData('receiptFooter'));
        $I->fillField(
            $this->shopsPage->getSelector('phoneNumberField'),
            $this->shopsPage->getData('phoneNumber'));
        $I->fillField(
            $this->shopsPage->getSelector('addressField'),
            $this->shopsPage->getData('address'));
        $I->fillField(
            $this->shopsPage->getSelector('zipField'),
            $this->shopsPage->getData('zipCode'));
        $I->fillField(
            $this->shopsPage->getSelector('cityField'),
            $this->shopsPage->getData('city'));
        $I->fillField(
            $this->shopsPage->getSelector('countryField'),
            $this->shopsPage->getData('country'));
        $I->fillField(
            $this->shopsPage->getSelector('orgNrField'),
            $this->shopsPage->getData('orgNr'));
        $I->fillField(
            $this->shopsPage->getSelector('latitudeField'),
            $this->shopsPage->getData('latitude'));
        $I->fillField(
            $this->shopsPage->getSelector('longitudeField'),
            $this->shopsPage->getData('longitude'));
        $I->scrollIntoView($this->shopsPage->getSelector('saveShopButton'));
        $I->waitForElementClickable($this->shopsPage->getSelector('saveShopButton'), 15);
        $I->click($this->shopsPage->getSelector('saveShopButton'));
        $I->seeElement($this->shopsPage->getSelector('shopUpdatedToastMessage'));
        return $this;
    }

    public function deleteNewShop(AcceptanceTester $I): self
    {
        $I->reloadPage();
        $I->waitForElement($this->shopsPage->getSelector('shopsSearchResults'));
        $this->selectShopFromSearchTab(
            $I,
            $this->shopsPage->getData('shopName')
        );
        $I->scrollIntoView($this->shopsPage->getSelector('removeShopButton'));
        $I->waitForElementClickable($this->shopsPage->getSelector('removeShopButton'), 15);
        $I->click($this->shopsPage->getSelector('removeShopButton'));
        $I->click($this->shopsPage->getSelector('confirmRemoveShopButton'));
        $I->seeElement($this->shopsPage->getSelector('shopRemovedToastMessage'));
        return $this;
    }

    public function updateShopOpeningHoursAndVipps(AcceptanceTester $I): self
    {
        $this->selectShopFromSearchTab($I, $this->shopsPage->getData('shopName'));
        $this->setAllDaysOpeningHoursForShop($I);
        $this->setVippsForShop($I);
        return $this;
    }

    private function setAllDaysOpeningHoursForShop(AcceptanceTester $I): void
    {
        $I->waitForElement($this->shopsPage->getSelector('openingHoursTab'), 15);
        $I->wait(1);
        $I->click($this->shopsPage->getSelector('openingHoursTab'));
        $I->click($this->shopsPage->getSelector('setAllDaysHoursFromField'));
        $I->fillField($this->shopsPage->getSelector('setAllDaysHoursFromField'), 7);
        $I->fillField($this->shopsPage->getSelector('setAllDaysMinutesFromField'), 0);
        $I->fillField($this->shopsPage->getSelector('setAllDaysHoursToField'), 23);
        $I->fillField($this->shopsPage->getSelector('setAllDaysMinutesToField'), 0);
        $I->scrollIntoView($this->shopsPage->getSelector('saveShopButton'));
        $I->waitForElementClickable($this->shopsPage->getSelector('saveShopButton'), 15);
        $I->click($this->shopsPage->getSelector('saveShopButton'));
        $I->seeElement($this->shopsPage->getSelector('shopUpdatedToastMessage'));
    }

    private function setVippsForShop(AcceptanceTester $I): void
    {
        $I->seeElement($this->shopsPage->getSelector('vippsTab'));
        $I->waitForElementClickable($this->shopsPage->getSelector('vippsTab'), 15);
        $I->click($this->shopsPage->getSelector('vippsTab'));
        $I->fillField($this->shopsPage->getSelector('merchantSerialNumberField'), 1234567);
        $I->click($this->shopsPage->getSelector('vippsActiveRadioButton'));
        $I->waitForElementClickable($this->shopsPage->getSelector('saveShopButton'), 15);
        $I->click($this->shopsPage->getSelector('saveShopButton'));
        $I->seeElement($this->shopsPage->getSelector('shopUpdatedToastMessage'));
    }

    private function selectShopFromSearchTab(AcceptanceTester $I, string $shopName): void
    {
        $newShop = $I->findSelectorByText(
            $I,
            $this->shopsPage->getSelector('shopsSearchResults'),
            $shopName
        );
        $I->click($newShop);
    }
}
