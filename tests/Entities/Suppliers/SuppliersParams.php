<?php

namespace Entities\Suppliers;

class SuppliersParams
{
    public string $uniqueId;
    public string $suppliersEndpoint = '/suppliers';
    public array $suppliersIdNameEmailParams = [];
    public array $suppliersFullParams = [];
    public string $suppliersWithIdEndpoint;
    public array $suppliersDeleteResponseParams = [];
    public string $suppliersCountEndpoint;
    public array $modifiedNameParam =
        [
            'name' => 'modified'
        ];
    public array $modifiedSuppliersFullParams = [];
    public function __construct()
    {
        $this->uniqueId = uniqid();
        $this->suppliersIdNameEmailParams =
            [
                'id' => $this->uniqueId,
                'name' => 'test',
                'email' => 'test@test.com'
            ];
        $this->suppliersFullParams =
            [
                'id' => $this->uniqueId,
                'name' => 'test',
                'cvr' => null,
                'email' => 'test@test.com',
                'phone' => null,
                'address' => null,
                'contact_person' => null,
                'external_id' => null,
            ];
        $this->suppliersWithIdEndpoint = "$this->suppliersEndpoint/$this->uniqueId";
        $this->suppliersDeleteResponseParams =
            [
                'success' => true,
            ];
        $this->suppliersCountEndpoint = "/count$this->suppliersEndpoint";
        $this->modifiedSuppliersFullParams =
            [
                'id' => $this->uniqueId,
                'name' => 'modified',
                'cvr' => null,
                'email' => 'test@test.com',
                'phone' => null,
                'address' => null,
                'contact_person' => null,
                'external_id' => null,
            ];
    }
}