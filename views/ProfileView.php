
<?php require_once "form/nav.php"; ?>
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
<?php require_once 'form/footer.php'; ?>
