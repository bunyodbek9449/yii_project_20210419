<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Constants;
use frontend\models\PersonForm;

class PersonController extends Controller 
{
    public function actionIndex() 
    {
        $model = new PersonForm();
        if($model->load(\Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $model->save();
            }
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

