<?php 
include_once 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Name = $_POST['name'];
  $Birthday = $_POST['birthday'];
  $Gender_id = $_POST['gender_id'];
  $Thong_tin = $_POST['thong_tin'];
  $Class_id = $_POST['class_id'];


  $sql = "INSERT INTO `quan_ly_hoc_sinh`
            (`name`,`birthday`,`gender_id`,`thong_tin`,`class_id`) 
            VALUES 
            ('$Name','$Birthday','$Gender_id','$Thong_tin','$Class_id')";

//   echo $sql;

  $conn->exec($sql);
  header('location:index.php');
}
$table = 'class';
$sql = "SELECT * FROM $table";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$rows = $stmt->fetchAll();

$table1 = 'gender';
$sql1 = "SELECT * FROM $table1";
$stmt1 = $conn->query($sql1);
$stmt1->setFetchMode(PDO::FETCH_OBJ);
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$rows1 = $stmt1->fetchAll();
// header('location:index.php');
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta  name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <form action="" method="POST">
 
    <label for="fname">Tên học sinh:</label><br>
    <input type="text" placeholder="Ten hoc sinh" name="name"><br>

    <label for="fname">Lớp:</label><br>
    <select name="class_id" id="cars">
      <?php foreach ($rows as $row) { ?>
        <option value="<?= $row->id_class; ?>"><?= $row->name_class; ?></option>
      <?php } ?>

    </select><br>
    <label for="fname">Ngày sinh:</label><br>
    <input type="date" placeholder="birthday" name="birthday"><br>
    <label for="fname">Giới tính:</label><br>
    <select name="gender_id" id="cars">
      <?php foreach ($rows1 as $row) { ?>
        <option value="<?= $row->id_gender; ?>"><?= $row->name_gender; ?></option>
      <?php } ?>

    </select>    <label for="fname">Thông tin của học sinh:</label><br>
    <input type="text" placeholder="Ten sach" name="thong_tin"><br>
    

    </select>
    <input type="submit" value="Submit">
  </form>
</body>

</html>
