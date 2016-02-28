<h1>Результат поиска:</h1>
<ul>
    <?php foreach ($items as $item): ?>
        <li><h3><a href="/News/One?id=<?php echo $item->id; ?>"><?php echo $item->title; ?></a></h3></li>
    <?php endforeach; ?>
</ul>
<div><a href="/">На главную</a></div>
