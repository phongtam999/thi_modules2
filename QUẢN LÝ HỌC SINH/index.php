<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php 
include_once 'database.php';

global $conn;
$sql = "SELECT * FROM quan_ly_hoc_sinh JOIN class 
ON quan_ly_hoc_sinh.class_id=class.id_class JOIN gender 
ON gender.id_gender=quan_ly_hoc_sinh.gender_id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$rows = $stmt->fetchAll();
// print_r ($rows);
?>
<a href="add.php">THÊM</a>
<table border="1">
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach($rows as $row) : ?>
    <tr>
        <td><?=$row->id?></td>
        <td><?=$row->name?></td>
        <td>
            <a href="edit.php?id=<?=$row->id?>">edit</a>
            <a href="delete.php?id=<?=$row->id?>">delete</a>
</td>
    </tr>
    <?php endforeach; ?>
</table>
<?php

?>