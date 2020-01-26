
<?php require_once "form/nav.php"; ?>
<?php require_once "$checkAuth[enterned]"; ?>
</div>
</nav>
<article id ="container">
    <div id="singleContent">
        <h3><?= $articleItem['title']; ?></h3>
        <span class="name">Автор: <?= $articleItem['author_name']; ?></span>
        <span class="date"><?= $articleItem['date']; ?></span>
        <p><?= $articleItem['content']; ?></p><br>
        <?php if ($tagList): foreach ($tagList as $tag): ?>
                <?= $tag ?>
            <?php endforeach;
        endif; ?>
        <a class="src" href="<?= URL; ?>">Назад</a>
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
<?php } require_once "$checkAuth[comment]"; ?>
</article>
<?php require_once 'form/footer.php'; ?>
