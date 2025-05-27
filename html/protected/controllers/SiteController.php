<?php

class SiteController extends CController
{
    public function actionIndex()
    {
        // Testa a conexão com o banco
        try {
            Yii::app()->db->active = true;
            $message = "Database connection successful!";
        } catch (Exception $e) {
            $message = "Database error connection :" . $e->getMessage();
        }

        $this->render('index', array('message' => $message));
    }
}
