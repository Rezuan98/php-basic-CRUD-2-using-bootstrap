<?php
include "connect.php";

$id = $_GET['idno']; 

$delete = "DELETE FROM newtable WHERE id = $id";
$exc = mysqli_query($connect,$delete);
if($exc){
    header("location:mainpage.php");
}




?>