<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Constants;
use frontend\models\PersonForm;

class PersonController extends Controller 
{
    public function actionIndex() 
    {
        $model = new PersonForm();

        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $model->save();
            Yii::$app->session->setFlash('success', 'Muvaffaqqiyatli qo`shildi');
            return $this->redirect('/person');
        }
        return $this->render('index', ['model'=>$model]);
    }

    public function actionView() 
    {
        $newarray = new Constants();
        $result = $newarray->Constantsarray();

        return $this->render('view', ["data" => $result]);
    }
}

