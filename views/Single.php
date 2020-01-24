
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?a=12222121">
    </head>
    <body>
        <?php require_once "form/nav.php"; 
              require_once "$checkAuth"; ?>
            </div>
        </nav>
        <article id ="container">
            <div id="singleContent">
                <h3><?= $articleItem['title']; ?></h3>
                <span class="name">Автор: <?= $articleItem['author_name']; ?></span>
                <span class="date"><?= $articleItem['date']; ?></span>
                <p><?= $articleItem['content']; ?></p><br>
                <a class="src" href="http://test25/">Назад</a>
            </div>
            <div class="pag">
                <h3>Комментарии пользователей:</h3>
            </div>
            <?php if (!empty($articleComments)) { ?>

                <?php foreach ($articleComments as $articleComment) { ?>
                    <div class="pag">
                        <span class="name">Автор: <?= $articleComment['author_name']; ?></span>
                        <span class="date"><?= $articleComment['date']; ?></span>
                        <p><?= $articleComment['comment']; ?></p><br>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="pag">
                    <h3>Статью еще никто не комментировал!</h3>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['session_username'])) { ?>
                <div class="pag">
                    <form action="" method="post">
                        <input type="hidden" name="author_id" value="">
                        <textarea name="comment" class='singleTextarea'></textarea>
                        <input type="submit" name="submit" class='subAdd'>
                    </form>
                </div>
            <?php } ?> 
        </article>
        <?php require_once 'form/footer.php'; ?>
    </body>
</html>

