
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?a=1221">
    </head>
    <body>
        <div id ="container">
            <div id ="header">
                <div id="title">
                    <h1><a class='Ht' href="http://test25">My First Blog</a></h1>
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
            <div id="singleContent">
                <h3><?php echo $articleItem['title']; ?></h3>
                <span class="name">Автор: <?php echo $articleItem['author_name']; ?></span>
                <span class="date"><?php echo $articleItem['date']; ?></span>
                <p><?php echo $articleItem['content']; ?></p><br>
                <a class="src" href="http://test25/">Назад</a>
            </div>
            <div class="pag">
                <h3>Comments</h3>
                <?php if (!empty($articleComments)) { ?>
 
                    <?php foreach ($articleComments as $articleComment) { ?>
                        <span class="name">Автор: <?php echo $articleComment['author_name']; ?></span>
                        <span class="date"><?php echo $articleComment['date']; ?></span>
                        <p><?php echo $articleComment['comment']; ?></p><br>
                        <?php
                    }
                }
                ?>
                <?php if (isset($_SESSION['session_username'])) { ?>
                    <form action="" method="post">
                        <input type="hidden" name="author_id" value="">
                        <textarea name="comment" class='textarea'></textarea>
                        <input type="submit" name="go" class='subAdd'>
                    </form>
                <?php } ?> 
            </div>
            <div id ="footer">
                <p class="p">FOOTER<p>
            </div>
        </div>
    </body>
</html>

