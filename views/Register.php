
<?php require_once "form/nav.php"; ?>
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
        <p class="fName">Уже зарегистрированы? <a href= "<?= URL; ?>">Назад</a></p>
    </form>
</div>
<?php require_once 'form/footer.php'; ?>
