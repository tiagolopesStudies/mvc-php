<?php

return [
    [
        'path' => '/login',
        'method' => 'GET',
        'file' => 'login.php',
    ],
    [
        'path' => '/',
        'method' => 'GET',
        'file' => 'video-list.php',
    ],
    [
        'path' => '/videos',
        'method' => 'GET',
        'file' => 'send-video.php',
    ],
    [
        'path' => '/videos/create',
        'method' => 'POST',
        'file' => 'create-video-action.php',
    ],
    [
        'path' => '/videos/update',
        'method' => 'POST',
        'file' => 'update-video-action.php',
    ],
    [
        'path' => '/videos/delete',
        'method' => 'POST',
        'file' => 'delete-video-action.php',
    ]
];
