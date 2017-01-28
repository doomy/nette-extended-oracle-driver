<?php

namespace ExtendedOracleDriver;

use Dibi\Connection as DibiConnection;
use ExtendedOracleDriver\Result as CustomResult;
use Dibi\ResultDriver;
use Dibi\Type;

class Connection extends DibiConnection
{
    public function createResultSet(ResultDriver $resultDriver) {
        $res = new CustomResult($resultDriver);
        return $res->setFormat(Type::DATE, $this->config['result']['formatDate'])
            ->setFormat(Type::DATETIME, $this->config['result']['formatDateTime']);
    }

    public function __sleep()
    {
        return [];
    }

    public function __wakeup()
    {
        return [];
    }


}