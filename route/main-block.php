
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
            <?=getTitle($mainMenu)?>
            <h1>Возможности проекта —</h1>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
        </td>
        <td class="right-collum-index">
            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <li class="project-folders-v-active"><a href="/?login=<?="yes"?>">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php
            if(!empty($_GET)) {
                if($_GET['login'] === "yes") {
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/registration-form.php';
                }
            }
            ?>
        </td>
    </tr>
</table>