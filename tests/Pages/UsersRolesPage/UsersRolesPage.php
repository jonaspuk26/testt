<?php

namespace Pages\UsersRolesPage;

use Pages\PageObject;

class UsersRolesPage extends PageObject
{
    protected array $selector =
        [
            'nameField' => '#name',
            'idInputField' => '[class="input-container input-with-button"] input',
            'generateIdButton' => '[class="input-container input-with-button"] button',
            'saveRoleButton' => '#button-save',
            'addNewRoleButton' => '[class="button add-new search-field-action search-field-action-small ng-binding ng-scope active"]',
            'webpageRightsTab' => '#tab-button--tab-2',
            'appRightsTab' => '#tab-button--tab-3',
            'roleToastMessage' => '.messages',
            'rolesSearchResults' => '[class="search-result ng-scope"]',
            'removeRoleButton' => '#button-remove',
            'confirmRemoveRoleButton' => '[class="btn btn-primary ng-binding"]',
        ];

    protected array $data =
        [
            'roleName' => 'TestRole'
        ];
}