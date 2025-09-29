<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Tiagolopes\Mvc\Database\Connection;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = Connection::getInstance();
$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS videos (
        id SERIAL PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL
    );
SQL;

$db->exec($sql);
