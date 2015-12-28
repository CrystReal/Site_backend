<?php
/**
 * Created by PhpStorm.
 * User: Mart
 * Date: 13.09.13
 * Time: 15:03
 */

class DashboardController extends MainController
{
    public function actionIndex()
    {
        $this->render("index");
    }
} 