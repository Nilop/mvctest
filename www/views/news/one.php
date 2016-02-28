<h2><?php echo $item->title; ?></h2>
<span><?php echo $item->datatime; ?></span>
<p><?php echo $item->text; ?></p>
<div><a href="/Admin/FormUpdatenews?id=<?php echo $item->id; ?>">Редактировать новость</a></div>
<div><a href="/Admin/FormDeletenews?id=<?php echo $item->id; ?>">Удалить новость</a></div>
<div><a href="/News/FormSendEmail?id=<?php echo $item->id; ?>">Отправить новость по e-mail</a></div>
<div><a href="/">На главную</a></div>
