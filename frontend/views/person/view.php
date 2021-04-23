<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col">nomi</th>
            <th scope="col">aholi_soni</th>
            <th scope="col">maydoni</th>
            <th scope="col">poytaxti</th>
            <th scope="col">pul_birligi</th>
        </tr>
        <?php $a=0; foreach($data as $item){
            echo "<tr>";
            echo "<th>" . $a++. "</th>";
            echo "<td>" . $item['nomi'] . "</td>";
            echo "<td>" . $item['aholi_soni'] . "</td>";
            echo "<td>" . $item['maydoni'] . "</td>";
            echo "<td>" . $item['poytaxti'] . "</td>";
            echo "<td>" . $item['pul_birligi'] . "</td>";
            echo "</tr>";
        }?>
    </table>
</body>
</html>