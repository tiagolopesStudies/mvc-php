<?php

declare(strict_types=1);

namespace Tiagolopes\Mvc\Database;

use Pdo\Pgsql;

class Connection extends Pgsql
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            $host = $_ENV['DB_HOST'];
            $port = $_ENV['DB_PORT'];
            $dbname = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];

            self::$instance = new self("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
        }

        return self::$instance;
    }
}
