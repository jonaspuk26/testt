<?php

namespace Dotenv\Entities\Customers;

class CustomerContacts
{
    public string $uniqId;
    public array $customerContacts = [];

    public function __construct(string $customerId)
    {
        $this->uniqId = uniqid();
        $this->customerContacts =
            [
                "id" => $this->uniqId,
                "customer_id" => $customerId,
                "name" => "testy",
                "employee_number" => "string",
                "email" => "teest@example.com",
                "phone" => "string"
            ];
    }
}