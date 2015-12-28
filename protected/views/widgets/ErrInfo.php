<?php

class ErrInfo extends CHtml
{

    public static function errorSummaryText($model = null, $header = '<div class="alert alert-danger">',
                                            $footer = '</div>')
    {
        $content = '';
        if (!is_null($model)) {
            if (!is_array($model)) {
                $model = array($model);
            }
            foreach ($model as $m) {
                foreach ($m->getErrors() as $errors) {
                    foreach ($errors as $error) {
                        if ($error != '') {
                            $content .= $header . "\n$error\n" . $footer;
                        }
                    }
                }
            }
        }
        $controller = Yii::app()->getController();
        if (isset($controller->errors) && count($controller->errors) > 0) {
            foreach ($controller->errors as $key => $error) {
                if (!is_array($controller->errors))
                    $content .= $header . "\n$error\n" . $footer;
                else
                    foreach ($error as $key1 => $error1) {
                        if (!is_array($error1) && $error1 != '') {
                            $content .= $header . "\n$error1\n" . $footer;
                        } else {
                            $content .= "Line " . $key . ":";
                            foreach ($error1 as $error2) {
                                $content .= $header . "\n$error2\n" . $footer;
                            }
                        }
                    }
            }

        }

        if (isset($controller->messages) && count($controller->messages) > 0) {
            foreach ($controller->messages as $error) {
                $content .= '<div class="alert alert-success">' . "\n$error\n" . '</div>';
            }
        }

        foreach (Yii::app()->user->getFlashes() as $key => $message) {
            if ($key == "messages")
                foreach ($message as $item)
                    $content .= '<div class="alert alert-info">' . "\n " . $item . " \n" . '</div>';
            else
                $content .= '<div class="alert alert-' . $key . '">' . "\n " . $message . " \n" . '</div>';
        }
        echo $content;
    }

}