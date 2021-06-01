<?php

namespace frontend\models;

use yii;
use yii\base\Model;


class Category extends Model
{
    public $id;
    public $name;
    public $parent_id;
    public $status;

    public function rules()
    {
        return[
            ['name', 'trim'],
            ['name', 'string', 'max'=>50],
            ['name', 'required', 'message' => 'Ismingiz kiritmadi'],
            [['parent_id', 'status'], 'integer' 'max'=>11],
            [['parent_id', 'status'], 'required'],
        ];
    }
    
    public function save()
    {
        // insert into person() values()
        $sql = "insert into category (name, parent_id, status)
                values(:name, :parent_id, :status)";
        $values = [
            ':name'=>$this->name,
            ':parent_id'=>$this->parent_id,
            ':status'=>$this->status,
        ];
        $command = \Yii::$app->db->createCommand($sql)->bindValues($values);
        return $command->execute();
    }

    public function update()
    {
        $sql = "UPDATE category SET name = :name, parent_id = :parent_id, status = :status
        WHERE id = :id";
        $values = [
            ':id'=>$this->id,
            ':name'=>$this->name,
            ':parent_id'=>$this->parent_id,
            ':status'=>$this->status,
        ];
        $command = \Yii::$app->db->createCommand($sql)->bindValues($values);
        return $command->execute();


    }

    public function delete()
    {
        $sql = "DELETE FROM category WHERE id = :id";
        $values = [
            ':id'=>$this->id,
        ];
        $command = \Yii::$app->db->createCommand($sql)->bindValues($values);
        return $command->execute();
    }
}

?>