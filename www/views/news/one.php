<h2><?php echo $item->title; ?></h2>
<span><?php echo $item->datatime; ?></span>
<p><?php echo $item->text; ?></p>
<div><a href="/?ctrl=Admin&act=FormUpdatenews&id=<?php echo $item->id; ?>">Редактировать новость</a></div>
<div><a href="/?ctrl=Admin&act=FormDeletenews&id=<?php echo $item->id; ?>">Удалить новость</a></div>
<div><a href="/">На главную</a></div>
