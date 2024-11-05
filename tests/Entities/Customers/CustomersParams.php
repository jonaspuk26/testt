<?php

namespace Dotenv\Entities\Customers;
class CustomersParams
{
    public string $customersEndpoint = '/customers';
    public string $customersWithIdEndpoint;
    public string $customersCountEndpoint;
    public array $customersFullParams = [];
    public array $customersPostResponseParams = [];
    public array $customersGetResponseParams = [];
    public array $customersModifiedParams = [];
    public array $customersModifiedFullParams = [];
    public string $customerId;
    public object $customerObjects;
    public int $numberOfContacts = 2;
    public int $numberOfLocations = 2;
    public float $flatDiscountRate = 100;

    public function __construct()
    {
        $this->customerId = uniqid();
        $this->customerObjects = new CustomerObjects(
            $this->customerId,
            $this->numberOfContacts,
            $this->numberOfLocations
        );
        $customerContacts = $this->customerObjects->customerContacts;
        $customerLocations = $this->customerObjects->customerLocations;
        $this->customersFullParams =
            [
                "id" => $this->customerId,
                "name" => "name1",
                "email" => "$this->customerId@example.com",
                "card_number" => "string",
                "mobilephone" => "string",
                "workphone" => "string",
                "otherphone" => "string",
                "contact" => "string",
                "warning" => "string",
                "address" => "string",
                "city" => "string",
                "zipcode" => "string",
                "country" => "string",
                "company_cvr" => "string",
                "customer_type" => "CUSTOMER_TYPE_BASIC",
                "offline_customer" => true,
                "flat_discount_rate" => $this->flatDiscountRate,
                "notes" => "string",
                "password" => "string",
                "customer_contacts" => $customerContacts,
                "customer_locations" => $customerLocations,
            ];
        $this->customersWithIdEndpoint = "$this->customersEndpoint/$this->customerId";
        $this->customersPostResponseParams =
            [
                "id" => $this->customerId,
                "name" => "name1",
                "email" => "$this->customerId@example.com",
                "card_number" => "string",
                "mobilephone" => "string",
                "workphone" => "string",
                "otherphone" => "string",
                "contact" => "string",
                "warning" => "string",
                "address" => "string",
                "city" => "string",
                "zipcode" => "string",
                "country" => "string",
                "company_cvr" => "string",
                "customer_group_id" => null,
                "customer_type" => "CUSTOMER_TYPE_BASIC",
                "offline_customer" => '1',
                "flat_discount_rate" => "$this->flatDiscountRate",
                "notes" => "string",
                "customer_contacts" => $customerContacts,
                "customer_locations" => $customerLocations,
                "has_password" => true,
            ];
        $this->customersCountEndpoint = "/count$this->customersEndpoint";
        $this->customersGetResponseParams =
            [
                "id" => $this->customerId,
                "name" => "name1",
                "email" => "$this->customerId@example.com",
                "card_number" => "string",
                "mobilephone" => "string",
                "workphone" => "string",
                "otherphone" => "string",
                "contact" => "string",
                "warning" => "string",
                "address" => "string",
                "city" => "string",
                "zipcode" => "string",
                "country" => "string",
                "company_cvr" => "string",
                "customer_group_id" => null,
                "customer_type" => "CUSTOMER_TYPE_BASIC",
                "offline_customer" => '1',
                "flat_discount_rate" => "$this->flatDiscountRate.00",
                "notes" => "string",
                "customer_contacts" => $customerContacts,
                "customer_locations" => $customerLocations,
                "has_password" => true,
            ];

        $this->customersModifiedParams =
            [
                "card_number" => "modified",
                "mobilephone" => "modified",
                "workphone" => "modified",
            ];

        $this->customersModifiedFullParams =
            [
                "id" => $this->customerId,
                "name" => "name1",
                "email" => "$this->customerId@example.com",
                "card_number" => "modified",
                "mobilephone" => "modified",
                "workphone" => "modified",
                "otherphone" => "string",
                "contact" => "string",
                "warning" => "string",
                "address" => "string",
                "city" => "string",
                "zipcode" => "string",
                "country" => "string",
                "company_cvr" => "string",
                "customer_group_id" => null,
                "customer_type" => "CUSTOMER_TYPE_BASIC",
                "offline_customer" => '1',
                "flat_discount_rate" => "$this->flatDiscountRate.00",
                "notes" => "string",
                "customer_contacts" => $customerContacts,
                "customer_locations" => $customerLocations,
                "has_password" => true,
            ];
    }
}