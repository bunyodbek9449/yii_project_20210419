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
        $command = Yii::$app->db->createCommand("select * from person");
        $natija = $command->queryAll();
        return $this->render('index', ['data'=>$natija]);
    }

    public function actionAdd() 
    {
        $model = new PersonForm();

        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $model->save();
            Yii::$app->session->setFlash('success', 'Успешно добавленно');
            return $this->redirect('/person');
        }
        return $this->render('add', ['model'=>$model]);
    }

    public function actionView($id) 
    {   
        $sql = "select * from person where id = :param_1";
        $command = Yii::$app->db->createCommand($sql);
        $command->bindParam(':param_1', $id);
        $data_1 = $command->queryAll();
        return $this->render('view', ["data" => $data_1]);
    }

    public function actionEdit($id) 
    {   
        $sql = "select * from person where id = :param_1";
        $command = Yii::$app->db->createCommand($sql);
        $command->bindParam(':param_1', $id);
        $data_1 = $command->queryAll();
        return $this->render('edit', ["data" => $data_1]);
    }
}

