<?php
include_once 'database.php';

// echo '<pre>';
// print_r($_REQUEST);
// die();
//
$id = $_REQUEST['id'];
// echo $id;
$sql = "DELETE FROM `quan_ly_hoc_sinh` WHERE `id` = $id ";
// echo $sql;
$conn->exec($sql);

//chuyen huong ve trang list.php
header("Location: index.php");