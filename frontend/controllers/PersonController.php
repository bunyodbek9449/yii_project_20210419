<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Constants;
use frontend\models\PersonForm;
use yii\data\Pagination;
use \yii\db\Query;

class PersonController extends Controller 
{
    public function actionIndex($page = null)
    {
        $limit = 10; //bu pagination korinadigan malumotlar soni
        $offset = !empty($page) ? ( ($page - 1) * $limit ) : 0;
        $person = (new Query())
                  ->select('*')
                  ->from('person')
                  ->all();
        $personCount = count($person);
        $paginationPages = ceil($personCount / $limit);
        $command = (new Query())
                   ->select('*')
                   ->from('person')
                   ->limit($limit)->offset($offset)
                   ->all();
        return $this->render('index', [
            'data' => $command, 
            'pagination' => $paginationPages,
        ]);
    }

    public function actionAdd() 
    {
        $model = new PersonForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $model->save();
            Yii::$app->session->setFlash('success', 'Успешно добавленно');
            return $this->redirect('/person/index');
        }
        return $this->render('add', ['model'=>$model]);
    }

    public function actionView($id) 
    {   
        $rows = (new Query())
                ->select('*')
                ->from('person')
                ->where('id = :param_1', [':param_1' => $id])
                ->one();
        return $this->render('view', ["data" => $rows]);
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
            return $this->redirect('/person/index');
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
            return $this->redirect('/person/index');
        }
        return $this->render('delete', ["model" => $model]);
    }
}