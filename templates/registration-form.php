<?php
require $_SERVER['DOCUMENT_ROOT'] . '/include/info.php';
$success = false;
$error = false;
if (!empty($_POST)) {
    if (!empty($_POST['submit'])) {
        if ($_POST['login'] == $login && $_POST['password'] == $password) {
            $success = true;
        } else {
            $error = true;
        }
    }
}
makeSuccess($success, $error);
?>
<div class="index-auth">
    <form action="/?login=<?= "yes" ?>" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="iat">
                    <label for="login_id">Ваш e-mail:</label>
                    <input id="login_id" size="30" name="login" value="<?= $_POST['login'] ?? '' ?>">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="password_id">Ваш пароль:</label>
                    <input id="password_id" size="30" name="password" value="<?= $_POST['password'] ?? '' ?>"
                           type="password">
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Авторизоваться"></td>
            </tr>
        </table>
    </form>
</div>