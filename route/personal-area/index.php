<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>
<div class="personal-area">
    <form action="">
        <div>
            <label>
                Имя:
                <input type="text" readonly value="<?= $_SESSION['user']['full_name'] ?>">
            </label>
        </div>
        <div>
            <label>
                Логин:
                <input type="text" readonly value="<?= $_SESSION['user']['login'] ?>">
            </label>
        </div>
        <div>
            <label>
                Email:
                <input type="text" readonly value="<?= $_SESSION['user']['email'] ?>">
            </label>
        </div>
        <div>
            <label>
                Активность пользователя:
                <input type="text" value="<?= $_SESSION['user']['flag_active'] === '1' ? 'Да' : 'Нет' ?>" readonly >
            </label>
        </div>
        <div>
            <label>
                Соглясие на получение уведомлений на почту:
                <input type="text" readonly value="<?= $_SESSION['user']['flag_consent'] === '1' ? 'Да' : 'Нет' ?>">
            </label>
        </div>
        <div>
            <label>
                Телефон:
                <input type="text" readonly value="<?= $_SESSION['user']['phone'] ?>">
            </label>
        </div>
    </form>
    <div class="list-group">
        <h1>Группы в готорых состоит пользователь</h1>
        <?php
        $listGroup = getGroups($_SESSION['user']['id']);
        while($row = mysqli_fetch_assoc($listGroup)) { ?>
            <p><?=$row['name']?></p>
        <?php }
        ?>
    </div>
</div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>
