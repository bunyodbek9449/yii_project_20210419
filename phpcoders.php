<?php
// 2ta variant xam bir xil ish bajaradi

// 1-variant "Query Builder" bajarilgan
$rows = (new Query())->select('*')->from('person')->where('id = :param_1', [':param_1' => $id])->one();
return $this->render('view', ["data" => $rows]);

// 2-variant "Ruchnoy yozilgan"
public function actionView($id) 
    {   
        $sql = "select * from person where id = :param_1";
        $command = Yii::$app->db->createCommand($sql);
        $command->bindParam(':param_1', $id);
        $data_1 = $command->queryOne();
        return $this->render('view', ["data" => $data_1]);
    }

?>