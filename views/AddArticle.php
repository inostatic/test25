
        <?php require_once "form/nav.php"; 
              require_once "$checkAuth[enterned]"; ?>
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
                    <button type="submit" class="subAdd" name="submit"><a class="bRed" href="<?=URL.'/myarticles';?>">Отмена</a></button>
                </form>
            </div>
        </article>
        <?php require_once 'form/footer.php'; ?>

