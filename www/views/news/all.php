<h1>Новости Енотоляндии</h1>
<ul>
<?php foreach ($items as $item): ?>
    <li><h3><a href="/?ctrl=News&act=One&id=<?php echo $item->id; ?>"><?php echo $item->title; ?></a></h3></li>
<?php endforeach; ?>
</ul>
<div><a href="/?ctrl=Admin&act=Addnews">Добавить новость</a></div>