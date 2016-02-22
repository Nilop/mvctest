<?php

class AdminController
{
    public function actionAddnews()
    {
        if (!empty($_POST))
        {
            $data = [];
            if ((!empty($_POST['title'])) and (!empty($_POST['text'])))
            {
                $data['title'] = $_POST['title'];
                $data['text'] = $_POST['text'];
                $data['datatime'] = date('Y-m-d H:i:s');
            }
            if (isset($data['title']) && isset($data['text']) && isset($data['datatime'])) {
                $news = new NewsModel();
                $news->title = $data['title'];
                $news->text = $data['text'];
                $news->datatime = $data['datatime'];
                $news->save();

                header('Location: /');
                die;
            }

        }

        header('Location: /?ctrl=Admin&act=FormAddnews');

    }

    public function actionUpdatenews()
    {
        $data = [];

        if ((!empty($_POST['title'])) and (!empty($_POST['text'])) and isset($_GET[id]))
        {

            $data['id'] = $_GET['id'];
            $data['title'] = $_POST['title'];
            $data['text'] = $_POST['text'];
            $data['datatime'] = date('Y-m-d H:i:s');
        }   else $error_report = 'Не указано как и какую новость необходимо обновить';

        if (isset($data['title']) && isset($data['text']) && isset($data['datatime']) && !(isset($eror_report))) {
            $news = new NewsModel();
            $news->id = $data['id'];
            $news->title = $data['title'];
            $news->text = $data['text'];
            $news->datatime = $data['datatime'];
            $news->save();
            header('Location: /');
            die;
        } else {
            $view = new View;
            $view->error_report = $eror_report;
            $view->display('second/error.php');
        }
    }

    public function actionDeletenews()
    {
        if (isset($_GET['id']))
        {
            $news = NewsModel::getOneById($_GET['id']);
            $news->delete();
            header('Location: /');
        } else {
            $view = new View();
            $view->error_report = 'Не указана новость для удаления';
            $view->display('second/error.php');
        }




    }

    public function actionFormAddNews()
    {
        $view = new View;
        $view->display('admin/addnews.php');
    }

    public function actionFormUpdatenews()
    {
        $id = $_GET['id'];
        $news = NewsModel::getOneById($id);
        $view = new View;
        $view->item = $news;
        $view->display('admin/updatenews.php');
    }

    public function actionFormDeletenews()
    {
        $id = $_GET['id'];
        $news = NewsModel::getOneById($id);
        $view = new View;
        $view->item = $news;
        $view->display('admin/deletenews.php');
    }

}