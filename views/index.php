
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?a=335225221211">
    </head>
    <body>
        <div id ="container">
            <div id ="header">
                <div id="title">
                    <h1><a class='Ht' href="http://test25">My First Blog</a></h1>
                </div>
                <div id="form">

                    <?php
                    if (!isset($_SESSION['session_username'])) {
                        require_once('form/formLogin.php');
                    } else {
                        require_once('form/formEntered.php');
                    }
                    ?>

                </div>
            </div>
            <div id ="leftside">
                <p class="p"></p>
            </div>
            <div id ="rightside">
                <p class="p"></p>
            </div>
            <div class="pag">
                <?php require_once 'form/pagination.php'; ?>
            </div>
            <?php foreach ($articleList as $article) { ?>
                <div id="content">
                    <h3><?=$article['title']; ?></h3>
                    <span class="name">Автор: <?=$article['author_name']; ?></span>
                    <span class="date"><?=$article['date']; ?></span>
                    <p><?php echo $article['short_content']; ?></p><br>
                    <span class="src"><a href="http://test25/article/<?=$article['id'] ?>">Читать полностью</a></span>
                </div>
            <?php } ?>

            <div id ="footer">
                <p class="p">FOOTER<p>
            </div>
        </div>
    </body>
</html>
<!-- coment -->