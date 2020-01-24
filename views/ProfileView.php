<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?asd=522231">
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
        </article>
        <?php require_once 'form/footer.php'; ?>
    </div>
</body>
</html>
