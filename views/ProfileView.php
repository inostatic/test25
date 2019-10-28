<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?asd=5231">
    </head>
    <body>
        <div id ="container">
            <div id ="header">
                <div id="title">
                    <h1><a class='Ht' href="http://test25">Личные данные</a></h1>
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
                        <td>ФИО:</td>
                    <form method="POST" action="">
                        <td><?= $userProfile['full_name']; ?></td>
                        <td><input type="text" name="full_name"></td>
                        <td><input type="submit" name="submit" value="Изменить"></td>
                    </form>
                    </tr>
                    <tr>
                    <form method="POST">
                        <td>E-mail:</td><td><?= $userProfile['email']; ?></td>
                        <td><input type="text" name="email"></td>
                        <td><input type="submit" name="submit" value="Изменить"></td>
                    </form>
                    </tr>
                </table> 
            </div>

            <div id ="footer">
                <p class="p">FOOTER<p>
            </div>
        </div>
    </body>
</html>
