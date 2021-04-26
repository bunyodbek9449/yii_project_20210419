<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Constants;
use frontend\models\PersonForm;
use yii\data\Pagination;

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
        $data_1 = $command->queryOne();
        $model = new PersonForm();
        $model->load($data_1, '');
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $model->id = $id;
            $model->update();
            Yii::$app->session->setFlash('success', 'Успешно изменено');
            return $this->redirect('/person');
        }
        return $this->render('edit', ["model" => $model]);
    }

    public function actionDelete($id)
    {
        $sql = "select * from person where id = :param_1";
        $command = Yii::$app->db->createCommand($sql);
        $command->bindParam(':param_1', $id);
        $data_1 = $command->queryOne();
        $model = new PersonForm();
        $model->load($data_1, '');
        $model->id = $id;
        if(Yii::$app->request->get('confirm'))
        {
            $model->id = $id;
            $model->delete();
            Yii::$app->session->setFlash('success', 'Успешно удаленно');
            return $this->redirect('/person');
        }
        return $this->render('delete', ["model" => $model]);
    }
}