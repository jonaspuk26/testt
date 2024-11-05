<?php

namespace Dotenv\Entities\Customers;

class CustomerObjects
{
    public array $customerContacts = [];
    public array $customerLocations = [];

    public function __construct(
        string $customerId,
        int $numberOfContacts,
        int $numberOfLocations
    )
    {
        $this->generateCustomerContacts($customerId, $numberOfContacts);
        $this->generateCustomerLocations($customerId, $numberOfLocations);
    }

    public function generateCustomerContacts(string $customerId, int $numberOfContacts): void
    {
        for ($i = 0; $i < $numberOfContacts; $i++) {
            $this->customerContacts[$i] = (new CustomerContacts($customerId))->customerContacts;
        }
    }

    public function generateCustomerLocations(string $customerId, int $numberOfLocations): void
    {
        for ($i = 0; $i < $numberOfLocations; $i++) {
            $this->customerLocations[$i] = (new CustomerLocations($customerId))->customerLocations;
        }
    }
}