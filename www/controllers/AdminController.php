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
                $data['data'] = date('Y-m-d H:i:s');
            }
            if (isset($data['title']) && isset($data['text']) && isset($data['data'])) {
                News::insertOne($data);
                header('Location: /');
                die;
            }
        }

        include __DIR__ . '/../views/admin/add.php';
    }
}