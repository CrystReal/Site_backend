<?php

/**
 * Created by Alex Bond.
 * Date: 02.02.14
 * Time: 0:17
 */
class UsersController extends MainController
{
    public function actionIndex()
    {
        $model = new Users("search");
        $model->unsetAttributes();
        if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];
        $data = $model->search();

        $this->render("index", ["dataProvider" => $data, "model" => $model]);
    }
} 