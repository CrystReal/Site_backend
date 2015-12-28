<?php

/**
 * User: David
 * Date: 1/8/14 10:26 PM
 */
class BlocksController extends MainController
{
    public function actionIndex()
    {
        $base = Blocks::model()->findAll();
        $this->render('index', array('base_model' => $base));
    }

    public function actionCreate()
    {
        $this->actionUpdate(true);
    }

    public function actionUpdate($new = false)
    {
        if ($new)
            $base = new Blocks();
        else
            $base = Blocks::model()->findByPk($_GET['id']);
        if (Yii::app()->request->isPostRequest) {
            $base->attributes = $_POST['Blocks'];
            if (!$base->hasErrors() && $base->save()) {
                $this->redirect($this->createUrl("index"));
            }
        }
        $this->render('add_edit', array('model' => $base));
    }

    public function actionDelete()
    {
        if (Blocks::model()->deleteByPk($_GET['id'])) {
            Yii::app()->user->setFlash('success', "Deleted!");
            $this->redirect($this->createUrl("index"));
        } else {
            Yii::app()->user->setFlash('error', "Error!");
            $this->redirect($this->createUrl("index"));
        }
    }
}