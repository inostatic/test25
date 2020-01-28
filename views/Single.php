
<?php require_once "form/nav.php"; ?>
<div id="singleContent">
    <h3><?= $articleItem['title']; ?></h3>
    <span class="name"><?= $articleItem['author_name']; ?></span>
    <span class="date"><?= $articleItem['date']; ?></span>
    <p><?= $articleItem['content']; ?></p><br>
    <?php if ($tagList): foreach ($tagList as $tag): ?>
            <?= $tag ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <a class="src" href="<?= URL; ?>">Назад</a>
</div>
<div class="pag">
    <h3>Комментарии пользователей:</h3>
</div>
<?php if (!empty($articleComments)) : ?>
    <?php foreach ($articleComments as $articleComment) : ?>
        <div class="pag">
            <span class="name"><?= $articleComment['author_name']; ?></span>
            <span class="date"><?= $articleComment['date']; ?></span>
            <p><?= $articleComment['comment']; ?></p><br>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="pag">
        <h3>Статью еще никто не комментировал!</h3>
    </div>
<?php endif; ?>
<?php require_once COM; ?>
<?php require_once 'form/footer.php'; ?>