
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>blog</title>
        <link rel="stylesheet" href="../template/styleSingle.css?asd=4">
    </head>
    <body>
        <header>
            <h1>My First Blog</h1>
        </header>
        <div class="perents">
            <div id="full">
                <div id="wrapper">
                    <div>
                        <h3><?php echo $articleItem['title']; ?></h3>
                        <span class="name">Автор: <?php echo $articleItem['author_name']; ?></span>
                        <span class="date"><?php echo $articleItem['date']; ?></span>
                        <p><?php echo $articleItem['content']; ?></p><br>
                        <span class="src"><a href="http://test25/">Назад</a></span>
                    </div>
                </div> 
            </div>
        </div>
    </body>
</html>




