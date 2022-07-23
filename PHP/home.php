<?php
session_start();

require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";
require_once "..\components\header.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
    body {
        background-image: url("https://static.vecteezy.com/system/resources/previews/001/849/553/original/modern-gold-background-free-vector.jpg");
        margin-: 0;

    }



    h1 {
        font-size: 2rem;
        margin-top: 1em;
        font-family: 'Dancing Script', cursive;

    }
    </style>


</head>

<body>
    <h1 class="text-center text-light "> Welcome to Animal Adoption</h1>
    <div class='container '>

        <div class='row  gap-5 col-lg-12 col-md-10 col-sm-6'>
            <?php
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

                 <a href='.\login.php' class='btn btn-primary'>show details</a>
             </div>
         </div>
 
    ";
      }
      
      }
    
    
    ?>
        </div>
    </div>


</body>

</html>