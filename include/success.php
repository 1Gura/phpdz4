<?php
function makeSuccess($success = false, $error = false)
{
    $_SESSION['isAuthorize'] = 'yes';
    if ($success === true && $error === false) {
        ?>
        <p class="success">
            Вы авторизовались!
        </p>
    <?php } else if ($success === false && $error === true) { ?>
        <p class="error">
            Вы ввели неверный логин или пароль!
        </p>
    <?php }
} ?>
