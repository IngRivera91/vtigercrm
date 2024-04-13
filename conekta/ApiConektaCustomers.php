<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/config.apiconekta.php';

class ApiConektaCustomers
{
    private $url;
    private $bearerToken;
    public function __construct()
    {
        $this->url = ConfigApiConekta::$url;
        $this->bearerToken = ConfigApiConekta::$bearerToken;
    }

    public function createCustomer($firstName, $email, $phone): string
    {
        print_r();
    }

    public function updateCustomer($otherPhone, $firstName, $email, $phone)
    {
        print_r();
    }

    public function customerExist($otherPhone): bool
    {
        return true;
    }
}