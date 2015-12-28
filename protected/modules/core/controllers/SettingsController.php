<?php
/**
 * Created by PhpStorm.
 * User: Mart
 * Date: 12.08.13
 * Time: 14:38
 */

class SettingsController extends MainController
{
    public function actionIndex()
    {
        $model = Settings::model()->findAll();
        if (Yii::app()->request->isPostRequest) {
            foreach ($_POST['Settings'] as $key => $item) {
                Settings::model()->updateByPk($key, array("value" => $item));
            }
            $this->redirect($this->createUrl("index"));
        }
        $this->render("settings", array("model" => $model));
    }
} 