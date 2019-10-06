<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?asd=5422">
    </head>
    <body>
        <div id ="container">
            <div id ="header">
                <div id="title">
                    <h1><a class='Ht' href="http://test25">Добавить новую статью</a></h1>
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
                <form action='' method='POST' class="redactor">
                    <p class='title'><label>Название статьи:</label></p>
                    <input class='titleForm' type='text' name ='title'>
                    <p class='title'><label>Содержание статьи:</label></p>
                    <textarea class='textarea' name='content'></textarea>
                    <input type='submit' name='add' class='subAdd'>
                    <button type="submit" class="subAdd" name="submit"><a class="bRed" href="http://test25/myarticles">Отмена</a></button>
                </form>
            </div>

            <div id ="footer">
                <p class="p">FOOTER<p>
            </div>
        </div>
    </body>
</html>

