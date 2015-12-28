<?php

class StaticController extends MainController
{
    public function actionIndex()
    {
        $base = StaticPages::model()->findAll('parent=0');
        $this->render('index', array('base_model' => $base));
    }

    public function actionAdd()
    {
        $base = new StaticPages;
        if (Yii::app()->request->isPostRequest) {

            $base->attributes = $_POST['StaticPages'];
            if ($base->save()) {
                $this->redirect($this->createUrl("index"));
            }
        }
        $this->render('add_edit', array('base_model' => $base, 'h1' => 'Добавить страницу', 'submit' => 'Добавить'));
    }

    public function actionEdit()
    {
        $base = StaticPages::model()->findByPk($_GET['id']);
        if (Yii::app()->request->isPostRequest) {

            $base->attributes = $_POST['StaticPages'];
            if ($base->save()) {
                $this->redirect($this->createUrl("index"));
            }
        }
        $this->render('add_edit', array('base_model' => $base, 'h1' => 'Редактировать страницу', 'submit' => 'Сохранить'));
    }

    public function actionDelete()
    {
        if (StaticPages::model()->deleteByPk($_GET['id'])) {
            Yii::app()->user->setFlash("success", "Удалено");
            $this->redirect($this->createUrl("index"));
        } else {
            Yii::app()->user->setFlash("danger", "Ошибка удаления");
            $this->redirect($this->createUrl("index"));
        }
    }

}