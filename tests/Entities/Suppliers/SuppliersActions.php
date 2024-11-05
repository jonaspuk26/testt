<?php

namespace Entities\Suppliers;

use Tests\Support\ApiTester;

class SuppliersActions
{
    private SuppliersParams $suppliersParams;

    public function __construct(SuppliersParams $suppliersParams)
    {
        $this->suppliersParams = $suppliersParams;
    }

    public function createSupplier(ApiTester $I): self
    {
        $this->suppliersParams = new SuppliersParams();
        $I->sendPost(
            $this->suppliersParams->suppliersEndpoint,
            $this->suppliersParams->suppliersIdNameEmailParams
        );
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($this->suppliersParams->suppliersFullParams);
        return $this;
    }

    public function deleteSupplier(ApiTester $I): self
    {
        $I->sendDelete($this->suppliersParams->suppliersWithIdEndpoint);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson($this->suppliersParams->suppliersDeleteResponseParams);
        return $this;
    }

    public function getSupplier(ApiTester $I): self
    {
        $I->sendGet($this->suppliersParams->suppliersWithIdEndpoint);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson($this->suppliersParams->suppliersFullParams);
        return $this;
    }

    public function assertSuppliersAmount(ApiTester $I): self
    {
        $countFromList = $this->countSuppliersFromGetList($I);
        $I->sendGet($this->suppliersParams->suppliersCountEndpoint);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(
            [
                'count' => $countFromList
            ]
        );
        return $this;
    }

    private function getSuppliersList(ApiTester $I): string
    {
        $list = $I->sendGet($this->suppliersParams->suppliersEndpoint);
        $I->seeResponseCodeIsSuccessful();
        return $list;
    }

    private function countSuppliersFromGetList(ApiTester $I): int
    {
        return substr_count(
            $this->getSuppliersList($I),
            'name'
        );
    }

    public function modifySupplier(ApiTester $I): self
    {
        $I->sendPatch(
            $this->suppliersParams->suppliersWithIdEndpoint,
            $this->suppliersParams->modifiedNameParam
        );
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(
            $this->suppliersParams->modifiedSuppliersFullParams
        );
        return $this;
    }

    public function updateSupplier(ApiTester $I): self
    {
        $I->sendPut(
            $this->suppliersParams->suppliersWithIdEndpoint,
            $this->suppliersParams->modifiedSuppliersFullParams
        );
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(
            $this->suppliersParams->modifiedSuppliersFullParams
        );
        return $this;
    }
}