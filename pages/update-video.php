<?php

declare(strict_types=1);

use Tiagolopes\Mvc\Database\Connection;

$videoId = $_POST['video_id'];

if (empty($videoId) || !is_numeric($videoId)) {
    die('Invalid video ID.');
}

$title = $_POST['title'] ?? '';
$url   = $_POST['url'] ?? '';

$db = Connection::getInstance();

$sql = 'UPDATE videos SET title = :TITLE, url = :URL WHERE id = :ID';
$stmt = $db->prepare($sql);

if ($stmt === false) {
    die('Error preparing the statement.');
}

$stmt->bindParam(':TITLE', $title);
$stmt->bindParam(':URL', $url);
$stmt->bindParam(':ID', $videoId, PDO::PARAM_INT);
$stmt->execute();

header('Location: /');
exit;
