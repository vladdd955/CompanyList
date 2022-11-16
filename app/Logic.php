<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;


class Logic
{

    private Reader $csv;
    private Statement $amount;

    public function __construct(Reader $csv)
    {
        $this->csv = $csv;
    }

    public function companySetMethod(): Reader
    {
        $this->csv->setDelimiter(";");
        $this->csv->setHeaderOffset(0);
        return $this->csv;
    }

    public function companyGetMethod(): Reader
    {
        $this->csv->getHeader();
        $this->csv->getRecords();
        return $this->csv;
    }

    public function setAmount()
    {
        $this->amount = Statement::create()
            ->limit(30);
    }
    public function getRecords()
    {
        $this->csv->getRecords();
        return $this->amount->process($this->csv);
    }

}

