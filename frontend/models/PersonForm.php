<?php

namespace frontend\models;

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
            [['first_name', 'last_name', 'email', 'gender'], 'required', 'message' => 'To`ldirishing kerak tonka'],
            [['first_name', 'last_name', 'email'], 'string', 'max'=>50],
            [['email'], 'email'],
            ['gender', 'in', 'range'=>['erkak', 'ayol'], 'message' => 'erkak yoki ayol tentak.'],
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
}

?>