
        <?php require_once "form/nav.php"; 
              require_once "$checkAuth[enterned]"; ?>
            </div>
        </nav>
        <article id ="container">
            <div>
                <form action='' method='POST' class="redactor">
                    
                    <p class='title'><label>Название статьи:</label></p>
                    <input class='titleForm' type='text' name ='title' value="<?=$article['title']; ?>">
                    <p class='title'><label>Теги:</label></p>
                    <?=$tagList;?>
                    <input class='titleForm' type='text' name ='tags' placeholder='Добавить теги html ccs и тп(через пробел)' value="">
                    <p class='title'><label>Содержание статьи:</label></p>
                    <textarea class='textarea' name='content'><?=$article['content']; ?></textarea>
                    <input type='submit' name='add' class='subAdd' value="Изменить">
                    <button type="submit" class="subAdd" name="submit"><a class="bRed" href="<?=URL.'/myarticles';?>">Отмена</a></button>
                </form>
            </div>
        </article>
        <?php require_once 'form/footer.php'; ?>
<?php // var_dump($article); ?>