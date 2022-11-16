<?php

require_once "vendor/autoload.php";
use App\Company;
use League\Csv\Reader;
use App\Logic;


$csv = Reader::createFromPath('register.csv');

$logic = new Logic($csv);
$logic->setAmount();
$logic->companySetMethod();
$logic->companyGetMethod();


$record = $logic->getRecords();
$sia = [];

foreach ($record as $records) {
    $sia [] = new Company($records["name"], $records["regcode"]);
}

//var_dump($sia);


do {

    $userSelection = (int)readline("[1] Show all company. \n [2] Show company name \n [3] Show company by registration Nr. ");

} while($userSelection <= 0 || $userSelection >= 4);



switch ($userSelection) {
    case 1:
        foreach ($sia as $company) {
            echo " Company registration Nr. " . $company->getRegistrationCode() .  " Company name is " . $company->getName() . "\n";
            //var_dump($company);
        }
        break;
    case 2:
        $companyCode = (int) readline("Write company name ");
        foreach ($sia as $company) {
            if ($company->getName() === $companyCode) {
                echo " Company name is " . $company->getName();
            }
        }
        break;
    case 3:
        $companyID = (string) readline("Write company registration Nr. ");
        foreach ($sia as $company) {
            if ($company->getRegistrationCode() === $companyID) {
                echo " Company registration Nr. " . $company->getRegistrationCode() . " " . $company->getName();
            }
        }
        break;
}

