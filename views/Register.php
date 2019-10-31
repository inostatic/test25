<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?a=12111">
    </head>
    <body>
        <div id ="container">
            <div id ="header">
                <div id="title">
                    <h1><a class='Ht' href="http://test25">My First Blog</a></h1>
                </div>
                <div id="form">
                </div>
            </div>
            <div id ="leftside">
                <p class="p"></p>
            </div>
            <div id ="rightside">
                <p class="p"></p>
            </div>
            <div id="regist">
                <form action="" method="POST">
                    <p class="fName" ><label>Полное имя</label></p>
                    <input class="input" name="full_name" type="text">
                    <p class="fName"><label>E-mail</label></p>
                    <input class="input" name="email" type="email">
                    <p class="fName"><label>Имя пользователя</label></p>
                    <input class="input" name="username"type="text">
                    <p class="fName"><label>Пароль</label></p>
                    <input class="input"name="password"type="password">
                    <p class="fName"><input name= "register" id="bReg" type="submit" value="Зарегистрироваться"></p>
                    <p class="fName">Уже зарегистрированы? <a href= "http://test25">Назад</a></p>
                </form>
                <?php if (!empty($message)) { echo "<p class='fName'>" . "Сообщение: " . $message . "</p>";} ?>
            </div>
            <div id ="footer">
                <p class="p">FOOTER<p>
            </div>
        </div>
    </body>
</html>

