
<?php
require_once "form/nav.php";
require_once "$checkAuth[enterned]";
?>
</div>
</nav>
<article id ="container">
    <div>
        <table>
            <tr>
                <th width="700px">Название статьи</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            <?php if (!empty($articleList)) : ?>
                <?php foreach ($articleList as $title) : ?>
                    <tr>
                        <td><?= $title['title']; ?></td>
                        <td><a href="<?= URL . '/change/'; ?><?= $title['id']; ?>">Изменить</td>
                        <td><a href="<?= URL . '/myarticles/delete/'; ?><?= $title['id']; ?>">Удалить</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <tr>
                <td colspan="3" align="right"><a href="<?= URL . '/myarticles/add'; ?>">Добавить новую статью</a></td>
            </tr>

        </table>
    </div>
</article>
<?php require_once 'form/footer.php'; ?>


