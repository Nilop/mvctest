<?php

namespace App\Controllers;

use App\Models\News as NewsModel;
use App\Classes\View;
use App\Classes\E404Exception;

class News
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
        if (isset($news)) {
            $view = new View;
            $view->item = $news;
            $view->display('news/one.php');
        } else {
            $e = new E404Exception('Такой новости нет в базе');
            throw $e;
        }
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
            if (strlen($value)<3) {
            $e = new E404Exception('Слишком короткий поисковый запрос');
            throw $e;
        }
        } else {
            $e = new E404Exception('Не задано данных для поиска');
            throw $e;
        }

        $result = NewsModel::getByColumn($column, $value);


        if (isset($result)) {
            $view = new View;
            $view->items = $result;
            $view->display('news/findnewsresult.php');
        } else {
            $e = new E404Exception('Ничего не найдено...');
            throw $e;
        }
    }

    public function actionFormSendEmail() {
        $id = $_GET['id'];
        $news = NewsModel::getOneById($id);
        $view = new View;
        $view->item = $news;
        $view->display('news/FormSendEmail.php');
    }

    public function actionSendEmail() {

        $mail = new \PHPMailer;
        //будем отравлять письмо через СМТП сервер
        $mail->isSMTP();
        //хост
        $mail->Host = 'smtp.yandex.ru';
        //требует ли СМТП сервер авторизацию/идентификацию
        $mail->SMTPAuth = true;
        // логин от вашей почты
        $mail->Username = 'nik0lai';
        // пароль от почтового ящика
        $mail->Password = '3z2x4c9v0b1nfs';
        //указываем способ шифромания сервера
        $mail->SMTPSecure = 'ssl';
        //указываем порт СМТП сервера
        $mail->Port = '465';

        //указываем кодировку для письма
        $mail->CharSet = 'UTF-8';
        //информация от кого отправлено письмо
        $mail->From = 'nik0lai@yandex.ru';
        $mail->FromName = 'Админ';
        $mail->addAddress($_POST['mail']);

        $mail->isHTML(true);

        $mail->Subject = $_POST['title'];
        $mail->Body = $_POST['text'];

        if( $mail->send() ){
            echo 'Письмо отправлено';
        }else{
            echo 'Письмо не может быть отправлено. ';
            echo 'Ошибка: ' . $mail->ErrorInfo;
        }

    }


}