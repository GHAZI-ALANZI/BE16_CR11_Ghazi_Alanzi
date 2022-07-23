<?php




session_start();


require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";

$x="";

  //at the first just  user only show date without CRUD.....
  if(isset($_SESSION['adm'])){
$sql = "SELECT * FROM `users` WHERE user_id='{$_SESSION['user']}' ";
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
                    <p class="nav-link active text-light" aria-current="page"
                        style="font-size:2.3rem;font-family: 'Dancing Script', cursive;"><?=$row['email']?>
                    </p>
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
          
          if(isset($_POST['del'])){
            
            header("location:home.php");
          }
      
      
           echo $table="
                 <div class='card  shadow-lg text-light mb-3' style='width: 15rem;background-color: rgba(0, 0, 0, 0.55);'>
               <img src='..\pictures\\{$row["image"]}' class='card-img-top'style='width: 15rem;margin-left:-0.8rem;'>
               <div class='card-body'>
                   <h3 class='card-title'>{$row["name"]}</h3><hr>
                   <h6 class='card-title'>location:{$row["location"]}</h6><hr>
                   <h6 class='card-title'>Age: {$row["age"]} years</h6><hr>
  
                   <a href='./user.php?id={$row["animal_id"]}' class='btn btn-primary mb-3'>show details</a>
                   <a href='./details.php?id={$row["animal_id"]}' class='btn btn-success'>take me home</a>


               </div>
           </div>

           
      "
      
      ;
         
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

                            <a href='./user.php?id={$row["animal_id"]}' class='btn btn-primary mb-3'>show details</a>
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

                        <a href='./user.php?id={$row["animal_id"]}' class='btn btn-primary mb-3'>show details</a>
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

// just  user  can see that
if(isset($_SESSION['user'])){

  $sql = "SELECT * FROM `animal` where animal_id=$id ";
  $result = mysqli_query($conn, $sql);
  $table ='';
  $row = mysqli_fetch_assoc($result);
 
  
echo $table="

<div class='card mb-3 border-0 text-light' style='background-color: rgba(0, 0, 0, 0.55);'>
    <div class='row g-0'>
        <div class='col-md-5'>
            <img src='..\pictures\\{$row["image"]}' class='img-fluid rounded-start'>
        </div>
        <div class='col-md-8'>
            <div class='card-body'>
                <h1 class='card-title'>Name:<input type='text' class='bg-dark text-light' value='{$row["name"]}'disabled>
                </h1>
                <hr>
                <h4 class='card-title'>location:<input type='text' class='bg-dark text-light'
                        value='{$row["location"]}'></h4>
                <hr>
                <h4 class='card-title'>Age: <input type='text' class='bg-dark text-light' value='{$row["age"]}'disabled> years
                </h4>
                <hr>
                <h4 class='card-title'>description: <input type='text' class='bg-dark text-light'
                        value='{$row["description"]}'disabled> </h4>
                <hr>
                <h4 class='card-title'>Size:<input type='text' class='bg-dark text-light' value='{$row["size"]}'disabled> cm
                </h4>
                <hr>
                <h4 class='card-title'>Vaccinated: <input type='text' class='bg-dark text-light'
                        value='{$row["vaccinated"]} 'disabled></h4>
                <hr>
                <h4 class='card-title'>Breed: <input type='text' class='bg-dark text-light' value='{$row["breed"]}'disabled>
                </h4>
                <hr>
                <h4 class='card-title'>Status: <input type='text' class='bg-dark text-light' value='{$row["status"]} 'disabled>
                </h4>
            </div>
        </div>
    </div>
</div>
";}}

//any one not user it will be exit and end session!!!!!
if(!isset($_SESSION['user'])){
header("location:home.php");
session_unset();
session_destroy();
  exit();
  die();
}





  


?>
<!---------show details about animal ----------------------- -->

</body>

</html>