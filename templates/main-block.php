<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
            <h1>Возможности проекта —</h1>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с
                друзьями и просматривать списки друзей.</p>
        </td>
        <td class="right-collum-index">
            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <li class="project-folders-v-active"><a href="/?login=<?= "yes" ?>">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <?php
            if (!empty($_GET)) {
                if (!empty($_SESSION['isAuthorize']) && $_SESSION['isAuthorize']) { ?>
                    <h1><?=$_COOKIE['login']?>, Вы залогинены</h1>
                <?php }
                else if ($_GET['login'] === "yes") {
                    require __DIR__ . '/registration-form.php';
                }
                unset($_SESSION['login'], $_SESSION['password']);
            }
            ?>
        </td>
    </tr>
</table>