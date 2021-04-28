<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person/View</title>
</head>
<body>
<table class="table table-striped">
        <?php //foreach($data as $item): ?>
        <tr>
            <th scope="col">id</th>
            <td><?php echo $data['id']; ?></td>
        </tr>
        <tr>
            <th scope="col">first_name</th>
            <td><?php echo $data['first_name']; ?></td>
        </tr>
        <tr>
            <th scope="col">last_name</th>
            <td><?php echo $data['last_name']; ?></td>
        </tr>
        <tr>
            <th scope="col">email</th>
            <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
            <th scope="col">gender</th>
            <td><?php echo $data['gender']; ?></td>
        </tr>
        <tr>
            <th scope="col">created_at</th>
            <td><?php echo $data['created_at']; ?></td>
        </tr>
        <tr>
            <th scope="col">updated_at</th>
            <td><?php echo $data['updated_at']; ?></td>
        </tr>
        <?php //endforeach; ?>
    </table>
    <a class="btn btn-default" href="index">Orqaga qaytish</a>
</body>
</html>