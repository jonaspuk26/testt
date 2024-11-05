<?php

namespace Dotenv\Entities\Customers;

class CustomerLocations
{
    public string $uniqId;
    public array $customerLocations = [];

    public function __construct(string $customerId)
    {
        $this->uniqId = uniqid();
        $this->customerLocations =
            [
                "id" => $this->uniqId,
                "customer_id" => $customerId,
                "recipient_name" => "testy",
                "street_address" => "string",
                "zip_code" => "string",
                "city" => "string",
                "country" => "string"
            ];
    }
}