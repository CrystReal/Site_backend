<?php

/**
 * Created by Alex Bond.
 * Date: 14.11.13
 * Time: 19:59
 */
class AuthController extends CController
{
    public function actionIndex()
    {
        if (!Yii::app()->user->isGuest)
            $this->redirect("/");
        $user = new Users();

        if (Yii::app()->request->isPostRequest && isset($_POST['Auth'])) {
            $user->setAttributes($_POST['Auth']);
            $user->authenticate();
            if (!$user->hasErrors()) {
                $this->redirect("/");
            }
        }
        $this->render("index", array("model" => $user));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect("/");
    }
}