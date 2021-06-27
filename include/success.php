<?php
function makeSuccess()
{
    if (!empty($_GET['error']) && $_GET['error'] === 'yes') {
        ?>
        <p class="error">
            Вы ввели неверный логин или пароль!
        </p>
        <?php unset($_GET['error']);
    } else if(!empty($_GET['error']) && $_GET['error'] === 'no') { ?>
        <p class="success">
            Вы авторизовались!
        </p>
        <?php
    }
} ?>
