
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
         <link rel="stylesheet" href="../template/styleIndex.css?asd=521">
    </head>
    <body>
        <div id ="container">
            <div id ="header">
                <h1>My First Blog</h1>
                <form class="form1">
                    <input type="text">
                    <input type="text">
                    <input type="submit">
                </form>
            </div>
            <div id ="leftside">
                <p class="p">Левая колонка</p>
            </div>
            <div id ="rightside">
                <p class="p">Правая колонка</p>
            </div>
            <?php foreach($articleList as $article) {?>
            <div id="content">
                <h3><?php echo $article['title'];?></h3>
                <span class="name">Автор: <?php echo $article['author_name']; ?></span>
                <span class="date"><?php echo $article['date']; ?></span>
                <p><?php echo $article['short_content']; ?></p><br>
                 <span class="src"><a href="http://test25/article/<?php echo $article['id']?>">Читать полностью</a></span>
            </div>
            <?php } ?>
            <div id ="footer">
                <p class="p">FOOTER<p>
            </div>
        </div>
    </body>
</html>
