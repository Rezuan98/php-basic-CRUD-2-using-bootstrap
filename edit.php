<?php
include "connect.php";

$id = $_GET['idno'];

// if(isset($id)){
//     echo $id;
// }
$select="select * from newtable where id=$id";
$exc = mysqli_query($connect,$select);
$row = mysqli_fetch_assoc($exc);

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email =$_POST['email'];
    $mobile =$_POST['mobile'];

    $update = "update newtable set name='$name',email='$email',mobile='$mobile' where id=$id";
    $exc2 = mysqli_query($connect,$update); 

    if($exc2)
    {
        header("location:mainpage.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="mainpage.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class=" navbar">
    <nav>
        <a href="">Home</a>
        <a href="">Schedule</a>
        <a href="">Contact</a>
        <a href="">Services</a>
        <a href="">About</a>
    </nav>

    </div>

      <div class="input_section">
      <h1>Edit Information</h1>
        <br><br>
        <form action="" method="POST">
            <table>

        <input name="name" class="form-control" type=" text" value="<?php echo $row['name'];  ?> " placeholder=""><br>
        <input name= "email" class="form-control" type=" email" value="<?php echo $row['email'];  ?>" placeholder=""><br>
        <input name="mobile" class="form-control" type=" text" value="<?php echo $row['mobile'];  ?>" placeholder=""><br>
        <br><button name="submit" class="btn btn-primary" type="submit">Submit</button><br>
            </table>
        </form>
      </div>

</body>
</html>

