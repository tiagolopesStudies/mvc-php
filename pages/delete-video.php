<?php

declare(strict_types=1);

use Tiagolopes\Mvc\Database\Connection;

$videoId = $_GET['video_id'];

if (empty($videoId) || !is_numeric($videoId)) {
    die('Invalid video ID.');
}

$sql = 'DELETE FROM videos WHERE id = :ID';
$db = Connection::getInstance();
$stmt = $db->prepare($sql);
$stmt->bindParam(':ID', $videoId, PDO::PARAM_INT);
$stmt->execute();

header('Location: /');
exit;
