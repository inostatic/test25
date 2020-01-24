
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?a=3352225221232212331211">
    </head>
    <body>
        
                <?php require_once "form/nav.php"; 
                      require_once "$checkAuth"; ?>
            </div>
        </nav>
        <article id ="container">
            <div class="pag">
                <?php require_once 'form/pagination.php'; ?>
            </div>
            <?php foreach ($articleList as $article) { ?>
                <div id="content">
                    <h3><?= $article['title']; ?></h3>
                    <span class="name">Автор: <?= $article['author_name']; ?></span>
                    <span class="date"><?= $article['date']; ?></span>
                    <p><?php echo $article['short_content']; ?></p><br>
                    <span class="src"><a href="http://test25/article/<?= $article['id'] ?>">Читать полностью</a></span>
                </div>
            <?php } ?>
        </article>
     <?php require_once 'form/footer.php'; ?>
    </body>
</html>
