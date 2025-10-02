<?php

declare(strict_types=1);

use Tiagolopes\Mvc\Database\Connection;

$title = $_POST['title'] ?? '';
$url   = $_POST['url'] ?? '';

$db = Connection::getInstance();

$sql = 'INSERT INTO videos (title, url) VALUES (:TITLE, :URL)';

$stmt = $db->prepare($sql);

if ($stmt === false) {
    die('Error preparing the statement.');
}

$stmt->bindParam(':TITLE', $title);
$stmt->bindParam(':URL', $url);
$stmt->execute();

header('Location: /');
exit;
