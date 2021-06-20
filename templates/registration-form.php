<?php
//В задании со звёздочкой попытался реализовать свзяь 1 к 1
if (!empty($_POST)) {
    $success = false;
    $error = false;
    if (!empty($_POST['submit'])) {
        $key = 0;
        foreach ($logins as $login) {
            if ($login['login'] === $_POST['login']) {
                $key = $login['idPassword'];
            }
        }
        foreach ($passwords as $password) {
            if ($password['password'] === $_POST['password'] && $password['id'] === $key) {
                $success = true;
            }
        }
        if ($success === false) {
            $error = true;
        }
    }
}
?>
<?php
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
                <td><input type="submit" name="submit" value="Отправить"></td>
            </tr>
        </table>
    </form>
</div>