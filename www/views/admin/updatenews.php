<h1>Редактирование новости</h1>
<form action="/?ctrl=Admin&act=Updatenews&id=<?php echo $item->id; ?>" method="post">
    <label for="title">Отредактируйте заголовок новости:</label>
    <br>
    <input type="text" id="title" name="title" value="<?php echo $item->title; ?>" required>
    <br>
    <label for="content">Отредактируйте текст новости:</label>
    <br>
    <textarea cols="60" rows="10" id="content" name="text" required><?php echo $item->text; ?></textarea>
    <br>
    <input type="submit" value="Записать отредактированную новость">
</form>
<a href="/">На главную</a>
