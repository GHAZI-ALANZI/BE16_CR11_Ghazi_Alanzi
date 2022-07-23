<?php




session_start();


require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";

$x="";

  //at the first just admim  only show date AND admin just will be can add ,del.....
  if(isset($_SESSION['adm'])){
$sql = "SELECT * FROM `users` WHERE user_id='{$_SESSION['adm']}' ";
$result = mysqli_query($conn, $sql);
$table ='';
$row = mysqli_fetch_assoc($result);} 

if(isset($_SESSION['user'])){
$sql = "SELECT * FROM `users` WHERE user_id='{$_SESSION['user']}' ";
$result = mysqli_query($conn, $sql);
$table ='';
$row = mysqli_fetch_assoc($result);}


//not admin will go to home.php exit and die the connection
// if($row['status']!=="adm"){
//     header("Location:home.php");
//          exit();
//     die();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-image: url("https://static.vecteezy.com/system/resources/previews/001/849/553/original/modern-gold-background-free-vector.jpg");
        margin-: 0;

    }
    </style>
</head>


<body>

    <nav class="navbar navbar-expand-lg bg-dark " style="min-width:100vw;margin:0;">
        <div class=" container-fluid ">
            <img src='..\profile_img\\<?=$row["picture"]?>' class='card-img-top'
                style='width: 14rem;margin-left:0.5rem;border-radius:50%'>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav text-light">
                    <h1 class="nav-link active text-light" aria-current="page"
                        style="font-size:3rem;font-family: 'Dancing Script', cursive;">Hi <?=$row["f_name"]?>
                    </h1>
                    <form method="POST">
                        <button class="btn " name="Available"><a class=" nav-link active text-light" aria-current="page"
                                style="font-size:1.7rem;font-family: 'Dancing Script', cursive;">Available
                                Pet</a></button>
                        <button class="btn " type="submit" name="All"><a class=" nav-link active text-light"
                                aria-current="page" style="font-size:1.7rem;font-family: 'Dancing Script', cursive;">All
                                Pet</a></button>
                        <button class="btn " type="submit" name="Senior"><a class=" nav-link active text-light"
                                aria-current="page"
                                style="font-size:1.7rem;font-family: 'Dancing Script', cursive;">Senior
                                Pet</a></button>
                        <button class="btn " type="submit"><a class=" nav-link active text-light" aria-current="page"
                                href="./logout.php" style="font-size:1.7rem;font-family: 'Dancing Script', cursive;">Log
                                out</a></button>
                    </form>


                </div>
            </div>
        </div>
    </nav>
    <div class='container '>

        <div class='row  gap-5 col-lg-12 col-md-10 col-sm-6'>
            <?php

if(isset($_POST['All'])){
  $x=1;
}
if(isset($_POST['Senior'])){
  $x=2;
}
if(isset($_POST['Available'])){
  $x=3;
}

    if($x==1){
      $sql = "SELECT  `animal_id`,`image`, `name`, `location`, `age` FROM `animal` WHERE 1";
      $result = mysqli_query($conn, $sql);
      $table ="";
      
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          
          
      
      
           echo $table="
                 <div class='card  shadow-lg text-light mb-3' style='width: 15rem;background-color: rgba(0, 0, 0, 0.55);'>
               <img src='..\pictures\\{$row["image"]}' class='card-img-top'style='width: 15rem;margin-left:-0.8rem;'>
               <div class='card-body'>
                   <h3 class='card-title'>{$row["name"]}</h3><hr>
                   <h6 class='card-title'>location:{$row["location"]}</h6><hr>
                   <h6 class='card-title'>Age: {$row["age"]} years</h6><hr>
  
                   <a href='./details.php?id={$row["animal_id"]}' class='btn btn-primary mb-3'>show details</a>
                   <a href='./details.php?id={$row["animal_id"]}' class='btn btn-success'>take me home</a>

               </div>
           </div>
      ";
        }
        
        }
      
       
    } ?><div class='container '>

                <div class='row  gap-5 col-lg-12 col-md-10 col-sm-6'>
                    <?php
            if($x==2){
            $sql = "SELECT `animal_id`,`image`, `name`, `location`, `age` FROM `animal` WHERE age>8";
            $result = mysqli_query($conn, $sql);
            $table ="";

            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){




            echo $table="
            
                    <div class='card  shadow-lg text-light mb-3'
                        style='width: 15rem;background-color: rgba(0, 0, 0, 0.55);'>
                        <img src='..\pictures\\{$row["image"]}' class='card-img-top'
                            style='width: 15rem;margin-left:-0.8rem;'>
                        <div class='card-body'>
                            <h3 class='card-title'>{$row["name"]}</h3>
                            <hr>
                            <h6 class='card-title'>location:{$row["location"]}</h6>
                            <hr>
                            <h6 class='card-title'>Age: {$row["age"]} years</h6>
                            <hr>

                            <a href='./details.php?id={$row["animal_id"]}' class='btn btn-primary mb-3'>show details</a>
                            <a href='./details.php?id={$row["animal_id"]}' class='btn btn-success'>take me home</a>

                        </div>
                    </div>
            

            ";
            }

            }


            }


            ?><div class='container '>

                        <div class='row  gap-5 col-lg-12 col-md-10 col-sm-6'>
                            <?php
        if($x==3){
        $sql = "SELECT `animal_id`,`image`, `name`, `location`, `age` FROM `animal` WHERE status='Available'";
        $result = mysqli_query($conn, $sql);
        $table ="";

        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){




        echo $table="
        
                <div class='card  shadow-lg text-light mb-3'
                    style='width: 15rem;background-color: rgba(0, 0, 0, 0.55);'>
                    <img src='..\pictures\\{$row["image"]}' class='card-img-top'
                        style='width: 15rem;margin-left:-0.8rem;'>
                    <div class='card-body'>
                        <h3 class='card-title'>{$row["name"]}</h3>
                        <hr>
                        <h6 class='card-title'>location:{$row["location"]}</h6>
                        <hr>
                        <h6 class='card-title'>Age: {$row["age"]} years</h6>
                        <hr>

                        <a href='./details.php?id={$row["animal_id"]}' class='btn btn-primary mb-3'>show details</a>
                        <a href='./details.php?id={$row["animal_id"]}' class='btn btn-success'>take me home</a>

                    </div>
                </div>
        

        ";
        }

        }


        }


        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!---------show details about animal ----------------------- -->

<?php


if($x!==1 && $x!==2 && $x!==3 ){

$id=$_GET['id'];

$sql="";
$name='';
$location="";
$description="";
$size="";
$age="";
$vaccinated="";
$breed="";
$status="";

$sql = "SELECT * FROM `animal` where animal_id=$id ";
$result = mysqli_query($conn, $sql);
$table ='';
$row = mysqli_fetch_assoc($result);


if(isset($_SESSION['adm'])){

 if(isset($_POST['del'])){

$sql= "DELETE FROM `animal` WHERE animal_id=$id " ;
$result = mysqli_query($conn, $sql);

 }
 if(isset($_POST['change'])){
  $name=$_POST['name'];
  $location=$_POST['loc'];
  $description=$_POST['des'];
  $size=$_POST['si'];
  $age=$_POST['age'];
  $vaccinated=$_POST['vac'];
  $breed=$_POST['bre'];
  $status=$_POST['sta'];
  
  $sql="UPDATE `animal` SET `name`='$name',`location`='$location',`description`='$description',`size`='$size',`age`='$age',`vaccinated`='$vaccinated',`breed`='$breed',`status`='$status' WHERE animal_id=1";
  
  $result = mysqli_query($conn, $sql);
;}

  
 if(isset($_POST['add'])){
  $sql=" INSERT INTO `animal`( `name`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`) VALUES ('$name','$location','$description','$size','$age','$vaccinated','$breed','$status')";
  $result = mysqli_query($conn, $sql);

  ;}

  
echo $table="

<div class='card mb-3 border-0 text-light' style='background-color: rgba(0, 0, 0, 0.55);'>
    <div class='row g-0'>
    <form method='POST'>
        <div class='col-md-5'>
            <img src='..\pictures\\{$row["image"]}' class='img-fluid rounded-start'>
        </div>
        <div class='col-md-8'>
            <div class='card-body'>
                <h1 class='card-title'>Name:<input type='text' class='bg-dark text-light' value='{$name}' name='name'>
                </h1>
                <hr>
                <h4 class='card-title'>location:<input type='text' class='bg-dark text-light' value='{$location}'name='loc'></h4>
                <hr>
                <h4 class='card-title'>describiction: <input type='text' class='bg-dark text-light' value='{$description}'name='des'> years</h4>
                <hr>
                <h4 class='card-title'>Size: <input type='text' class='bg-dark text-light' value='{$size}' name='si'> </h4>
                <hr>
                <h4 class='card-title'>Age:<input type='text' class='bg-dark text-light' value='{$age}'name='age'>  cm</h4>
                <hr>
                <h4 class='card-title'>Vaccinated: <input type='text' class='bg-dark text-light' value='{$vaccinated}'name='vac'></h4>
                <hr>
                <h4 class='card-title'>Breed: <input type='text' class='bg-dark text-light' value='{$breed}'name='bre'> </h4>
                <hr>
                <h4 class='card-title'>Status: <input type='text' class='bg-dark text-light' value='{$status} 'name='sta'></h4>
            </div>
        </div>
    </div>
</div>

<button type='submit' class='btn btn-danger mb-5' name='del'>delete</button>
<button type='submit' class='btn btn-danger mb-5'name='change'>change</button>
<button type='submit' class='btn btn-danger mb-5'name='add'>add</button>
</form>";}}


//any one not admin it will be exit and end session!!!!!

if(!isset($_SESSION['adm'])){
  header("location:home.php");
  session_unset();
  session_destroy();
    exit();
    die();
  }




  


?>

</body>

</html>