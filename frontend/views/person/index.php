<?php

use yii\helpers\Html;
// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <a class="btn btn-success" href="add">ADD</a>
    </form>
    <br>
    <table class="table table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">first_name</th>
            <th scope="col">last_name</th>
            <th scope="col">email</th>
            <th scope="col">gender</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">function</th>
        </tr>
        <?php $a=0; foreach($data as $item){
            echo "<tr>";
            echo "<th>" . $a++. "</th>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['first_name'] . "</td>";
            echo "<td>" . $item['last_name'] . "</td>";
            echo "<td>" . $item['email'] . "</td>";
            echo "<td>" . $item['gender'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td>" . $item['updated_at'] . "</td>";
            echo "<td>" . '<a href="#">'. edit ."</a>" . " / " . '<a href="#">'. delete ."</a>" . "</td>";
            echo "</tr>";
        }?>
    </table>
</body>
</html>
<a href=""></a>