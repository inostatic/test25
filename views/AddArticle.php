<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?asd=52223233422">
    </head>
    <body>
        <?php require_once "form/nav.php"; 
              require_once "$checkAuth"; ?>
            </div>
        </nav>
        <article id ="container">
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
        </article>
        <?php require_once 'form/footer.php'; ?>
    </body>
</html>

