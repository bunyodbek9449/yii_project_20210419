<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->title = 'Anketa yangilash';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title; ?></title>
</head>
<body>
    <h1 class="text-center"></h1>
    <div class="container">
    <?php
        $form = ActiveForm::begin([
            'id' => 'person-form', 
            'options' => ['class' => 'form-horizontal'],
        ]);
    ?>
        <div class="row">
            <div class="col-lg-5"><?php echo $form->field($model, 'first_name')->textInput(['autofocus' => true]); ?></div>
        </div>
        
        <div class="row">
            <div class="col-lg-5"><?php echo $form->field($model, 'last_name'); ?></div>
        </div>
        
        <div class="row">
            <div class="col-lg-5"><?php echo $form->field($model, 'email')->input('email'); ?></div>
        </div>

        <div class="row">
            <div class="col-lg-5"><?php echo $form->field($model, 'gender'); ?></div>
        </div>
    </div>
</body>
</html>


<?php
echo Html::submitButton('Saqlash', ['class'=>'btn btn-success']);
?>
&nbsp;&nbsp;
<a class="btn btn-default" href="index">Orqaga qaytish</a>
<?php
ActiveForm::end();
?>