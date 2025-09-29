<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Tiagolopes\Mvc\Database\Connection;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$videoId = $_GET['video_id'];

if (empty($videoId) || !is_numeric($videoId)) {
    die('Invalid video ID.');
}

$sql = 'DELETE FROM videos WHERE id = :ID';
$db = Connection::getInstance();
$stmt = $db->prepare($sql);
$stmt->bindParam(':ID', $videoId, PDO::PARAM_INT);
$stmt->execute();

header('Location: /index.php');
exit;
