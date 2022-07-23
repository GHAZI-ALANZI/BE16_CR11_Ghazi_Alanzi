<?php

session_start();


require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";

$sql = "SELECT * FROM `users` where email='$email' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($row['status'] == 'adm') {
            $_SESSION['adm'] = $row['user_id'];
            header("Location: ./dashbord.php?id={$row['user_id']}");
        } if ($row['status'] == 'user') {
            $_SESSION['user'] = $row['user_id'];
            header("Location: ./user.php?id={$row['user_id']}");
        }
       
    
    //any one not admin or user it will be exit and end session!!!!!

else{session_destroy();
    exit();
    die();}




$x="";

       $id2=$_GET['id'];
$sql = "SELECT * FROM `users` WHERE user_id='$id2' ";
$result = mysqli_query($conn, $sql);
$table ='';
$row = mysqli_fetch_assoc($result);
$_SESSION['id']=$id2;

//not admin will exit and die the connection
// if($row['status']!=="adm"){
//     header("loation")
//     exit();
//     die();


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
          
          
      
      
           echo $table="
                 <div class='card  shadow-lg text-light mb-3' style='width: 15rem;background-color: rgba(0, 0, 0, 0.55);'>
               <img src='..\pictures\\{$row["image"]}' class='card-img-top'style='width: 15rem;margin-left:-0.8rem;'>
               <div class='card-body'>
                   <h3 class='card-title'>{$row["name"]}</h3><hr>
                   <h6 class='card-title'>location:{$row["location"]}</h6><hr>
                   <h6 class='card-title'>Age: {$row["age"]} years</h6><hr>
  
                   <a href='./details.php?id={$row["animal_id"]}' class='btn btn-primary'>show details</a>
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

                            <a href='./details.php?id={$row["animal_id"]}' class='btn btn-primary'>show details</a>
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

                        <a href='./details.php?id={$row["animal_id"]}' class='btn btn-primary'>show details</a>
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