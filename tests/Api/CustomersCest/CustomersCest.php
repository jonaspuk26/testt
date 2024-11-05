<?php

namespace Api\CustomersCest;

use Dotenv\Entities\Customers\CustomersActions;
use Entities\Authentication\AuthenticationActions;
use Tests\Support\ApiTester;

class CustomersCest
{
    private AuthenticationActions $auth;
    private CustomersActions $customers;

    public function _inject(
        AuthenticationActions $auth,
        CustomersActions      $customers
    ): void
    {
        $this->auth = $auth;
        $this->customers = $customers;
    }

    public function _before(ApiTester $I): void
    {
        $this->auth
            ->authenticate($I);
    }

    public function testCreateCustomer(ApiTester $I): void
    {
        $this->customers
            ->createCustomer($I)
            ->deleteCustomer($I);
    }

    public function testGetCustomer(ApiTester $I): void
    {
        $this->customers
            ->createCustomer($I)
            ->getCustomer($I)
            ->deleteCustomer($I);
    }

    public function testCustomersGetCount(ApiTester $I): void
    {
        $this->customers
            ->assertCustomersAmount($I);
    }

    public function testModifyCustomer(ApiTester $I): void
    {
        $this->customers
            ->createCustomer($I)
            ->modifyCustomer($I)
            ->deleteCustomer($I);
    }

    public function testUpdateCustomer(ApiTester $I): void
    {
        $this->customers
            ->createCustomer($I)
            ->updateCustomer($I)
            ->deleteCustomer($I);
    }
}