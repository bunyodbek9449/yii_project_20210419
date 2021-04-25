<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Вы уверены удалить пользователь <?php echo $model->first_name; ?> </h1>
    <a class="btn btn-success" href="/person/delete?confirm=yes&id=<?= $model->id; ?>">Да</a>
    <a class="btn btn-success" href="/person/index">Нет</a>
</body>
</html>