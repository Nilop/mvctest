<h1>Добавление новой новости</h1>
<form action="/Admin/Addnews" method="post">
    <label for="title">Введите заголовок новости:</label>
    <br>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="content">Введите текст новости:</label>
    <br>
    <textarea cols="60" rows="10" id="content" name="text" required></textarea>
    <br>
    <input type="submit" value="Добавить новость">
</form>
<a href="/">На главную</a>
