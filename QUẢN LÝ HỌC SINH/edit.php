<?php 
include_once 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Name = $_POST['name'];
  $Birthday = $_POST['birthday'];
  $Gender_id = $_POST['gender_id'];
  $Thong_tin = $_POST['thong_tin'];
  $Class_id = $_POST['class_id'];

  $id = $_GET['id'];

 $sql = "UPDATE `quan_ly_hoc_sinh` SET `name`='$Name',`birthday`='$Birthday',
 `gender_id`='$Gender_id',`thong_tin`='$Thong_tin',`class_id`='$Class_id' WHERE id = $id";

  // echo $sql;

  $conn->exec($sql);
  header('location:index.php');
}
// $table = 'class';
$sql = "SELECT * FROM class";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$classs = $stmt->fetchAll();

// $table2 = 'quan_ly_hoc_sinh';
$id = $_GET['id'];
$sql = "SELECT * FROM `quan_ly_hoc_sinh` where id = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$student = $stmt->fetch();

// $table1 = 'gender';
$sql= "SELECT * FROM gender";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$genders = $stmt->fetchAll();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta  name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <title>Document</title>
</head>

<body>
  <form action="" method="POST">
 
    <label for="fname">Tên học sinh:</label><br>
    <input type="text" value="<?= $student->name;?>" name="name"><br>

    <label for="fname">Lớp:</label><br>
    <select name="class_id" id="cars">
      <?php foreach ($classs as $row) { ?>
        <option <?=$row->id_class == $student->class_id ? "selected" : " " ?> value="<?= $row->id_class; ?>"><?= $row->name_class; ?></option>
      <?php } ?>

    </select>>
    <label for="fname">Ngày sinh:</label><br>
    <input type="text" placeholder="Ten sach"value="<?= $student->birthday; ?>" name="birthday"><br>
    <label for="fname">Giới tính:</label><br>
    <select name="gender_id" id="cars">
      <?php foreach ($genders as $row) { ?>
        <option <?=$row->id_gender == $student->gender_id ? "selected" : " " ?> value="<?= $row->id_gender; ?>"><?= $row->name_gender; ?></option>
      <?php } ?>

    </select>    <label for="fname">Thông tin của học sinh:</label><br>
    <input type="text"  value="<?= $student->thong_tin;?>" name="thong_tin"><br>
    

    </select>
    <input type="submit" value="Submit">
  </form>
</body>

</html>
