<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?asd=522222231">
    </head>
    <body>
        <?php require_once "form/nav.php"; 
              require_once "$checkAuth"; ?>
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
                    <?php if (!empty($articleList)) {
                        foreach ($articleList as $title) { ?>
                            <tr>
                                <td><?= $title['title']; ?></td>
                                <td><a href="http://test25/change/<?= $title['id']; ?>">Изменить</td>
                                <td><a href="http://test25/myarticles/delete/<?= $title['id']; ?>">Удалить</a></td>
                            </tr>
    <?php }} ?>
                    <tr>
                        <td colspan="3" align="right"><a href="http://test25/myarticles/add">Добавить новую статью</a></td>
                    </tr>

                </table>
            </div>
        </article>
        <?php require_once 'form/footer.php'; ?>
    </body>
</html>


