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
        <a class="btn btn-primary" href="/person/add">ADD</a>
    </form>
    <br>
    <table class="table table-striped">
        <tr>
            <th scope="col">id</th>
            <th scope="col">first_name</th>
            <th scope="col">last_name</th>
            <th scope="col">email</th>
            <th scope="col">gender</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">function</th>
        </tr>
        <?php foreach($data as $item){
            echo "<tr>";
            echo "<th>" . $item['id'] . "</th>";
            echo "<td>" . $item['first_name'] . "</td>";
            echo "<td>" . $item['last_name'] . "</td>";
            echo "<td>" . $item['email'] . "</td>";
            echo "<td>" . $item['gender'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td>" . $item['updated_at'] . "</td>";
            echo "<td>";
            ?> 
                <a class="btn btn-info" href="/person/view?id=<?= $item['id']; ?>">View</a>
                <a class="btn btn-success" href="/person/edit?id=<?= $item['id']; ?>">edit</a>
                <a class="btn btn-warning" href="/person/delete?id=<?= $item['id']; ?>">delete</a>
        <?php
            echo "</td>";
            echo "</tr>";
        }?>
    </table>
        <!--pagination_STARTS-->
        <?php
        $massiv = $data;
        $page_count = ceil(count($massiv)/5);
        $page = 0;
        if(empty($_GET['page'])){
            die();
        }else{
            if(isset($_GET['page'])){
                $page = $_GET['page'] - 1;
            }
        }

        $part = array_slice($massiv,($page * 5), 5 );?>
        <table class="table table-striped">
        <tr>
            <th scope="col">id</th>
            <th scope="col">first_name</th>
            <th scope="col">last_name</th>
            <th scope="col">email</th>
            <th scope="col">gender</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">function</th>
        </tr>
        <?php foreach($part as $item) {
            echo "<tr>";
            echo "<th>" . $item['id'] . "</th>";
            echo "<td>" . $item['first_name'] . "</td>";
            echo "<td>" . $item['last_name'] . "</td>";
            echo "<td>" . $item['email'] . "</td>";
            echo "<td>" . $item['gender'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td>" . $item['updated_at'] . "</td>";
            echo "<td>";
            ?>
                <a class="btn btn-info" href="/person/view?id=<?= $item['id']; ?>">View</a>
                <a class="btn btn-success" href="/person/edit?id=<?= $item['id']; ?>">edit</a>
                <a class="btn btn-warning" href="/person/delete?id=<?= $item['id']; ?>">delete</a>
        <?php
            echo "</td>";
            echo "</tr>";
        }?>
    </table>
        <?php
        for($i = 1; $i <= $page_count; $i++){ ?>
    <form method="get" action="index.php">
        <a class="btn btn-info" href="/person/index?page=<?= $i; ?>"> <?= $i; ?></a>
    </form>

        <?php } ?>
        <!--pagination_END-->
</body>
</html>