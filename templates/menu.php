<?php
echo "<ul class='main-menu $style'>";
foreach ($menu as &$item) {
    $title = cutString($item['title']);
    if (isCurrentUrl($item['path'])) {
        echo "<li class='selected'><a href = '{$item['path']}'>{$title}</a></li>";
    } else {
        echo "<li><a href = '{$item['path']}'>{$title}</a></li>";
    }
}
echo "</ul>";