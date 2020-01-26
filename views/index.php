
<?php
require_once "form/nav.php";
require_once "$checkAuth[enterned]";
?>
</div>
</nav>
<article id ="container">
    <div class="pag">
        <?php require_once 'form/pagination.php'; ?>
    </div>
    <?php foreach ($articleList as $article) : ?>
        <div id="content">
            <span><a href="<?= URL . '/article/'; ?><?= $article['id'] ?>"><h3><?= $article['title']; ?></h3></a></span>
            <span class="name">Автор: <?= $article['author_name']; ?></span>
            <span class="date"><?= $article['date']; ?></span>
            <p><?= $article['short_content']; ?></p><br>

            <span>
                <?php if (array_key_exists($article['id'], $tagList)) : ?>
                    <?php foreach ($tagList[$article['id']] as $elem) : ?>
                        <?= $elem; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </span>


        </div>
    <?php endforeach; ?>
</article>
<?php require_once 'form/footer.php'; ?>
