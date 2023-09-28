<?php

namespace App\Application\Database;

interface ConnectionInterface {
    public function connect(): \PDO;
}
