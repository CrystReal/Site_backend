<?php

/**
 * Created by Alex Bond.
 * Date: 01.02.14
 * Time: 20:55
 */
class SupportController extends MainController
{
    public function actionIndex()
    {
        $model = new SupportTickets("search");
        $model->unsetAttributes();
        if (isset($_GET['SupportTickets']))
            $model->attributes = $_GET['SupportTickets'];
        $data = $model->search();

        $this->render("index", ["dataProvider" => $data, "model" => $model]);
    }

    public function actionView()
    {
        $model = SupportTickets::model()->findByPk($_GET['id']);
        if (!$model) {
            throw new CHttpException(404, "Не найдено");
        }

        $this->render("view", ["model" => $model]);
    }


    public function actionComment()
    {
        if (!isset($_GET['id']))
            throw new CHttpException(500, "Ломаешь?");
        /**
         * @var $model SupportTickets
         */
        $model = SupportTickets::model()->findByPk($_GET['id']);
        if (!$model) {
            throw new CHttpException(404, "Не найдено");
        }
        if (Yii::app()->request->isPostRequest) {
            if (isset($_POST['content']) && isset($_POST['toClose'])) {
                if ($_POST['toClose'] == 1)
                    $model->status = 2;
                else
                    $model->status = 1;
                $model->save();
                $m2 = new SupportTicketsComments();
                $m2->ticketId = $model->id;
                $m2->userId = Yii::app()->user->id;
                $m2->datePosted = time();
                $m2->isAnswer = 1;
                $m2->content = $_POST['content'];
                $m2->save();
                Yii::import('ext.yii-mail.*');
                $message = new YiiMailMessage;
                $message->view = 'supportNewReply';
                $message->setSubject('Тикет #' . $model->id . " - Новый ответ");
                $message->setBody(array('model' => $model), 'text/html');
                $message->setTo($model->user->email);
                $message->from = array(Yii::app()->params['adminEmail'] => 'Crystal Reality Games');
                Yii::app()->mail->send($message);
                $this->redirect($this->createUrl("index"));
            } else {
                $this->redirect($this->createUrl("view", ["id" => $model->id]));
            }
        }
    }
} 