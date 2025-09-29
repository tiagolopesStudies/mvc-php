<?php
    require_once dirname(__DIR__) . '/vendor/autoload.php';

    use Tiagolopes\Mvc\Database\Connection;

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $videoId = $_GET['video_id'] ?? null;
    $video = null;

    if ($videoId !== null) {
        $db = Connection::getInstance();
        $sql = 'SELECT * FROM videos WHERE id = :ID';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':ID', $videoId, PDO::PARAM_INT);
        $stmt->execute();
        $video = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $action = $video ? 'update-video-action.php' : 'create-video-action.php';
?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/form-styles.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>

<body>

    <!-- Cabecalho -->
    <header>

        <nav class="cabecalho">
            <a class="logo" href="../index.php"></a>

            <div class="cabecalho__icones">
                <a href="#" class="cabecalho__videos"></a>
                <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <main class="container">

        <form class="container__formulario" action="/action/<?= $action ?>" method="post">
            <h2 class="formulario__titulo">
                <?= $video ? 'Atualize o vídeo!' : 'Envie um vídeo!' ?>
            </h2>
                <?php if ($video) : ?>
                    <input type="hidden" name="video_id" value="<?= $video['id'] ?>">
                <?php endif; ?>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input
                        name="url"
                        class="campo__escrita"
                        required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g"
                        id='url'
                        value="<?= $video ? $video['url'] : '' ?>"
                    />
                </div>

                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="title">Titulo do vídeo</label>
                    <input
                        name="title"
                        class="campo__escrita"
                        required
                        placeholder="Neste campo, dê o nome do vídeo"
                        id='title'
                        value="<?= $video ? $video['title'] : '' ?>"
                    />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>