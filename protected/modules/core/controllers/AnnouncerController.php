<?php

/**
 * User: David
 * Date: 1/8/14 10:26 PM
 */
class AnnouncerController extends MainController
{
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if (Yii::app()->user->model->rang == 1)
            return true;
        else
            throw new CHttpException(403, "Не дорос еще");
    }

    public function actionIndex()
    {
        $base = BungeeAnnouncer::model()->findAll();
        $this->render('index', array('base_model' => $base));
    }

    public function actionCreate()
    {
        $this->actionUpdate(true);
    }

    public function actionUpdate($new = false)
    {
        if ($new)
            $base = new BungeeAnnouncer();
        else
            $base = BungeeAnnouncer::model()->findByPk($_GET['id']);
        if (Yii::app()->request->isPostRequest) {
            $base->attributes = $_POST['BungeeAnnouncer'];
            if (!$base->hasErrors() && $base->save()) {
                $this->redirect($this->createUrl("index"));
            }
        }
        $this->render('add_edit', array('model' => $base));
    }

    public function actionDelete()
    {
        if (BungeeAnnouncer::model()->deleteByPk($_GET['id'])) {
            Yii::app()->user->setFlash('success', "Deleted!");
            $this->redirect($this->createUrl("index"));
        } else {
            Yii::app()->user->setFlash('error', "Error!");
            $this->redirect($this->createUrl("index"));
        }
    }
}