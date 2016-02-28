<h1>Отправка новости по e-mail</h1>
Будет отправлена новость с
<form action="/News/SendEmail" method="post">
    <label for="title">Заголовком:</label>
    <br>
    <input type="text" id="title" name="title" value="<?php echo $item->title; ?>" required>
    <br>
    <label for="content">Текстом:</label>
    <br>
    <textarea cols="60" rows="10" id="content" name="text" required><?php echo $item->text; ?></textarea>
    <br>
    <label for="datatime">Датой:</label>
    <br>
    <input type="text" id="datatime" name="datatime" value="<?php echo $item->datatime; ?>" required>
    <br>
    <label for="mail">На e-mail:</label>
    <br>
    <input type="text" id="mail" name="mail"  required>
    <br>
    <input type="submit" value="Отправить">
</form>
<a href="/">На главную</a>