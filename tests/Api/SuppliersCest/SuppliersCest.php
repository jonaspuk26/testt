<?php


namespace Api\SuppliersCest;

use Entities\Authentication\AuthenticationActions;
use Entities\Suppliers\SuppliersActions;
use Tests\Support\ApiTester;

class SuppliersCest
{
    private AuthenticationActions $auth;
    private SuppliersActions $suppliers;

    public function _inject(
        AuthenticationActions $auth,
        SuppliersActions      $suppliers
    ): void
    {
        $this->auth = $auth;
        $this->suppliers = $suppliers;
    }

    public function _before(ApiTester $I): void
    {
        $this->auth
            ->authenticate($I);
    }

    // tests
    public function testCreateSupplier(ApiTester $I): void
    {
        $this->suppliers
            ->createSupplier($I)
            ->deleteSupplier($I);
    }

    public function testGetSupplier(ApiTester $I): void
    {
        $this->suppliers
            ->createSupplier($I)
            ->getSupplier($I)
            ->deleteSupplier($I);
    }

    public function testSuppliersGetCount(ApiTester $I): void
    {
        $this->suppliers
            ->assertSuppliersAmount($I);
    }

    public function testModifySupplier(ApiTester $I): void
    {
        $this->suppliers
            ->createSupplier($I)
            ->modifySupplier($I)
            ->deleteSupplier($I);
    }

    public function testUpdateSupplier(ApiTester $I): void
    {
        $this->suppliers
            ->createSupplier($I)
            ->updateSupplier($I)
            ->deleteSupplier($I);
    }
}
