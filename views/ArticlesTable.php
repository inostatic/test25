<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?asd=5241111">
    </head>
    <body>
        <div id ="container">
            <div id ="header">
                <div id="title">
                    <h1>Редактор статей</h1>
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
            <div>
                <table>
                    <tr>
                        <th width="700px">Название статьи</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                    <?php if(!empty($articleList)) { foreach($articleList as $title) { ?>
                    <tr>
                        <td><?php echo $title['title']; ?></td>
                        <td>Изменить</td>
                        <td>Удалить</td>
                    </tr>
                    <?php }} ?>
                    <tr>
                        <td colspan="3" align="right"><a href="http://test25/myarticles/add">Добавить новую статью</a></td>
                    </tr>

                </table>
            </div>

            <div id ="footer">
                <p class="p">FOOTER<p>
            </div>
        </div>
    </body>
</html>

