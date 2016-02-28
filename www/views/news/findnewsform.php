<h1>Поиск новостей</h1>
<form action="/News/FindNewsResult" method="post">
    <label for="option">Поиск новости по:</label>
    <br>
    <select size="2"  id="option" name="column" required>
        <option value="title">Заголовку</option>
        <option value="text">Тексту</option>
    </select>
    <br>
    <label for="content">Введите ключевое слово или текст для поиска:</label>
    <input type="text" id="value" name="value">
    <br>
    <input type="submit" value="Найти новости">
</form>
<a href="/">На главную</a>