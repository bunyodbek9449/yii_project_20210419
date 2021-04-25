<?php

namespace frontend\models;

use yii;
use yii\base\Model;


class PersonForm extends Model
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $gender;

    public function rules()
    {
        return[
            [['first_name', 'last_name', 'email', 'gender'], 'trim'],
            ['first_name', 'required', 'message' => 'Ismingiz kiritmadi'],
            ['last_name', 'required', 'message' => 'Familiyangiz kiritmadi'],
            ['email', 'required', 'message' => 'Pochtangiz kiritmadi'],
            ['gender', 'required', 'message' => 'erkak yoki ayol kiritishingiz kerak'],
            ['gender', 'in', 'range'=>['erkak', 'ayol'], 'message' => 'erkak yoki ayol kiritishingiz kerak'],
            [['first_name', 'last_name', 'email'], 'string', 'max'=>50],
            [['email'], 'email'],
        ];
    }
    
    public function save()
    {
        // insert into person() values()
        $sql = "insert into person (first_name, last_name, email, gender)
                values(:first_name, :last_name, :email, :gender)";
        $values = [
            ':first_name'=>$this->first_name,
            ':last_name'=>$this->last_name,
            ':email'=>$this->email,
            ':gender'=>$this->gender,
        ];
        $command = \Yii::$app->db->createCommand($sql)->bindValues($values);
        return $command->execute();
    }

    public function update()
    {
        $sql = "UPDATE person SET first_name = :first_name, last_name = :last_name, email = :email, gender = :gender
        WHERE id = :id";
        //print_r($this->attributes);die();
        $values = [
            ':id'=>$this->id,
            ':first_name'=>$this->first_name,
            ':last_name'=>$this->last_name,
            ':email'=>$this->email,
            ':gender'=>$this->gender,
        ];
        $command = \Yii::$app->db->createCommand($sql)->bindValues($values);
        return $command->execute();


    }

    public function delete()
    {
        $sql = "DELETE FROM person WHERE id = :id";
        $values = [
            ':id'=>$this->id,
        ];
        $command = \Yii::$app->db->createCommand($sql)->bindValues($values);
        return $command->execute();
    }
}

?>