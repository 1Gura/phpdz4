<?php
makeSuccess();
?>
<div class="index-auth">
    <form action="../logic/authorize.php" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <?php if (empty($_COOKIE['login'])) { ?>
                <tr>
                    <td class="iat">
                        <label for="login_id">Ваш e-mail:</label>
                        <input id="login_id" size="30" name="login" value="<?= $_SESSION['login'] ?? '' ?>">
                    </td>
                </tr>
            <?php } else { ?>
                <h3>Логин уже сохранен на сайте!</h3>
                <a href="../logic/deleteLoginCookie.php">Я не <?= $_COOKIE['login'] ?>, хочу сменить пользователя</a>
            <?php } ?>
            <tr>
                <td class="iat">
                    <label for="password_id">Ваш пароль:</label>
                    <input id="password_id" size="30" name="password" value="<?= $_SESSION['password'] ?? '' ?>"
                           type="password">
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Авторизоваться"></td>
            </tr>
        </table>
    </form>
</div>