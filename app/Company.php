<?php

namespace App;

class Company
{
    private string $companyId;
    private string $companyName;

    public function __construct(string $companyName, string $companyId)
    {
        $this->companyName = $companyName;
        $this->companyId = $companyId;
    }


    public function getName(): string
    {
        return $this->companyName;
    }
    public function getRegistrationCode(): string
    {
        return $this->companyId;
    }

}