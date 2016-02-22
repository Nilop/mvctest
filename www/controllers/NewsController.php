<?php

class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::getAll();
        $view = new View;
        $view->items = $news;
        $view->display('news/all.php');

    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $news = NewsModel::getOneById($id);
        $view = new View;
        $view->item = $news;
        $view->display('news/one.php');

    }

    public function actionFindNewsForm()
    {
        $view = new View;
        $view->display('news/findnewsform.php');
    }

    public function actionFindNewsResult()
    {
        if ((!empty($_POST['column'])) and (!empty($_POST['value'])))
        {
            $column = $_POST['column'];
            $value = $_POST['value'];
            if (strlen($value)<3) $eror_report= 'Слишком короткий поисковый запрос';
        } else $eror_report = 'Не указаны даные для поиска';

        if (isset($column) && isset($value) && !(isset($eror_report))) {
            $result = NewsModel::getByColumn($column, $value);
            if (count($result)==0) ($eror_report='По вашему запросу ничего не найдено');
        }

        if (!(isset($eror_report))) {
            $view = new View;
            $view->items = $result;
            $view->display('news/findnewsresult.php');
        } else {
            $view = new View;
            $view->error_report = $eror_report;
            $view->display('second/error.php');
        }
    }

}