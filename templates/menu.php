<ul class='main-menu <?=$style?>'>
    <?php
    foreach ($menu as $item) {
        $title = cutString($item['title']);
        ?>
        <li class='<?= isCurrentUrl($item['path']) ? 'selected' : '' ?>'>
            <a href='<?= $item['path'] ?>'><?=cutString($item['title'])?></a>
        </li>
        <?php
    }
    ?>
</ul>;