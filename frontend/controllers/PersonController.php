<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Constants;

class PersonController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        $newarray = new Constants();
        $result = $newarray->Constantarray();

        return $this->render('view', ["data => $result"]);
    }
}

?>