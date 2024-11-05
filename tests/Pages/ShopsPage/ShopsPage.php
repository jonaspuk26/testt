<?php

namespace Pages\ShopsPage;

use Pages\PageObject;

class ShopsPage extends PageObject
{
    protected array $selector =
        [
            'addNewShopButton' => '[class="button add-new search-field-action search-field-action-small ng-binding ng-scope active"]',
            'shopNameField' => '#name',
            'descriptionField' => '#description',
            'receiptHeaderField' => '#receipt_text_header',
            'receiptFooterField' => '#receipt_text_footer',
            'priceRegionField' => '#price_region',
            'stockLocationField' => '#stock_location',
            'phoneNumberField' => '#phone_number',
            'addressField' => '#address',
            'zipField' => '#zipcode',
            'cityField' => '#city',
            'countryField' => '#country',
            'orgNrField' => '#cvr',
            'latitudeField' => '#lat',
            'longitudeField' => '#lng',
            'saveShopButton' => '#button-save',
            'shopsSearchResults' => '[class="search-result-text ng-binding"]',
            'removeShopButton' => '#button-remove',
            'confirmRemoveShopButton' => '[ng-click="$close(true)"]',
            'shopRemovedToastMessage' => '.inner',
            'shopUpdatedToastMessage' => '.messages',
            'openingHoursTab' => '#tab-button--tab-2',
            'setAllDaysHoursFromField' => '#day_template_from input[placeholder="HH"]',
            'setAllDaysMinutesFromField' => '#day_template_from input[placeholder="MM"]',
            'setAllDaysHoursToField' => '#day_template_to input[placeholder="HH"]',
            'setAllDaysMinutesToField' => '#day_template_to input[placeholder="MM"]',
            'vippsTab' => '#tab-button--tab-3',
            'vippsActiveRadioButton' => '[for="vipps_enabled"]',
            'merchantSerialNumberField' => '#vipps_merchant_serial_number',
        ];

    protected array $data =
        [
            'shopName' => 'Mart',
            'description' => 'test',
            'receiptHeader' => 'test',
            'receiptFooter' => 'test',
            'phoneNumber' => '1234567890',
            'address' => 'test st. 1, test',
            'zipCode' => '123456',
            'city' => 'test',
            'country' => 'test',
            'orgNr' => '1',
            'latitude' => '1',
            'longitude' => '1',
        ];
}