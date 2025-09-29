<?php
    require_once __DIR__ . "/vendor/autoload.php";

    use Tiagolopes\Mvc\Database\Connection;

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $db = Connection::getInstance();
    $sql = 'SELECT * FROM videos';
    $stmt = $db->query($sql);
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <header>

        <nav class="cabecalho">
            <a class="logo" href="./index.php"></a>

            <div class="cabecalho__icones">
                <a href="./pages/send-video.php" class="cabecalho__videos"></a>
                <a href="./pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <ul class="videos__container" alt="videos alura">
        <?php foreach ($videos as $video) : ?>
            <li class="videos__item">
                <iframe width="100%" height="72%" src="<?= $video['url'] ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                <div class="descricao-video">
                    <img src="./img/logo.png" alt="logo canal alura">
                    <h3><?= $video['title'] ?></h3>
                    <div class="acoes-video">
                        <a href="./pages/send-video.php?video_id=<?= $video['id'] ?>">Editar</a>
                        <a href="./action/delete-video-action.php?video_id=<?= $video['id'] ?>">Excluir</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>