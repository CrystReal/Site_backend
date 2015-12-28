<?php

class ErrorController extends MainController
{
    public function actionError()
    {
        $this->Title = "Ошибка";
        $this->layout = false;
        if ($error = Yii::app()->errorHandler->error)
            $this->render('error', array('error' => $error));
    }
}