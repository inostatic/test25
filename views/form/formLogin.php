<form action="<?=URL.'/login';?>" method="POST">
    <label><p class="pForm">Login:</p></label>
    <input type="text" class="fForm" name="username"><br>
    <label><p class="pForm">Password:</p></label>
    <input type="password" class="fForm" name="password"><br>
    <button type="submit" class="bForm" name="submit">Вход</button>
    <button type="submit" class="bForm" name="submit"><a id="reg" href="<?=URL.'/register';?>">Регистрация</a></button>
</form>
