
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleIndex.css?asd=5">
    </head>
    <body>
        <header>
            <h1>Blogarticle</h1>
	</header>
        <div class="perents">
            <div id="full">
                <?php foreach($articleList as $article) {?>
                <div id="wrapper">
                    <div>
                        <h3><?php echo $article['title'];?></h3>
                        <span class="name">Автор: <?php echo $article['author_name']; ?></span>
                        <span class="date"><?php echo $article['date']; ?></span>
                        <p><?php echo $article['short_content']; ?></p><br>
                         <span class="src"><a href="http://test25/article/<?php echo $article['id']?>">Читать полностью</a></span>
                    </div>
                </div> 
                <?php } ?>
            </div>
        </div>
    </body>
</html>
