<?php
include "connect.php";

$ex ='';




if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email =$_POST['email'];
    $mobile =$_POST['mobile'];
    
    $image_name =$_FILES['myimage']['name'];
    $tmp_name = $_FILES['myimage']['tmp_name'];

    if( move_uploaded_file($tmp_name,"IMAGES/".$image_name)){


    $insert = "insert into newtable(name,email,image_name,mobile) values('$name','$email','$image_name','$mobile')";
    $ex = mysqli_query($connect,$insert);}
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Information</title>
    <link rel="stylesheet" href="mainpage.css" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <style>
  


    </style>
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
   
    <br><br>
    <!-- navbar ends -->
    <div class="input_section">
        <h1>Input New Information</h1>
        <br><br>
       
        <form action="" method="POST" enctype = "multipart/form-data">
        <input name="name" class="form-control" type=" text" placeholder="Enter your Name"><br>
        <input name= "email" class="form-control" type=" email" placeholder="Enter your Email"><br>
        <input name="mobile" class="form-control" type=" text" placeholder="Enter your Mobile number:"><br>
        <input type="file" name="myimage"><br>
        <br><button name="submit" class="btn btn-primary" type="submit">Submit</button><br>
        <?php
    if($ex){
        echo "Data insert successfull";
    }

    ?>




        </form>


    </div>




<br><br><br>
   <form class="datatable" action="" method="POST">
    <input type="search" name="srch" >
    <button name="srch_btn" class="btn btn-primary">Search</button>
   </form>

   <?php
   $search="";
   if(isset($_POST['srch_btn'])){

    $search=$_POST['srch'];

   }
?>

    <div class="datatable">
        <h1 class="first_heading">Information of members</h1>

        <form action="">

            <table id="table" class="table table-striped table-dark">
              <thead class="thead-dark">
                <th  >ID</th>
                <th  >Name</th>
                <th  >Email</th>
                <th>Image</th>
                <th>Mobile</th>
                <th>Edit</th>
                <th>Delete</th>
              </thead>
              <tbody>
<?php
                $select = "SELECT * FROM newtable where name like '%$search%' ";
                $exc = mysqli_query($connect,$select);
                 
                 
                 
While($row = mysqli_fetch_assoc($exc)){ ?>

<tr>
    <td><?php echo $row['id'];?> </td>
    <td><?php echo $row['name'];?> </td>
    <td><?php echo $row['email'];?> </td>
    <td><img height="100" width="100" src="IMAGES/<?php echo $row['image_name']?>"></td>
    <td><?php echo $row['mobile'];?> </td>
    <td><a href="edit.php?idno=<?php echo $row['id'] ?>">edit</a></td>
    <td><a href="delete.php?idno=<?php echo $row['id'] ?>">delete</a></td>
    
    </tr>

          
              
<?php

// print_r($row)
}?>
               
               
                

                 
</tbody>
            </table>


        </form>

    </div>
    </body>

</html>