<h2>Новости Енотоляндии</h2>
<ul>
<?php foreach ($items as $item): ?>
    <li><h3><a href="/News/One?id=<?php echo $item->id; ?>"><?php echo $item->title; ?></a></h3></li>
<?php endforeach; ?>
</ul>
<div><a href="/Admin/Addnews">Добавить новость</a></div>
<div><a href="/News/FindNewsForm">Поиск новостей</a></div>

