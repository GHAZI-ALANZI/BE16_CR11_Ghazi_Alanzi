<?php
session_start();
require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";


// *******if thera are no adm and no user website go to login page*******
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}

//***********if session user exist it shouldn't access home.php******

// if (isset($_SESSION["user"])) {
//   header("Location: home.php");
//   exit;
// }

$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM users WHERE status = '$status'";
$result = mysqli_query($conn, $sql);

//this variable will hold the body for the table
$tbody = '';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
     echo  $tbody = "<nav class='navbar navbar-expand-lg bg-dark ' style='min-width:100vw;margin:0;'>
      <div class=' container-fluid '>
          <img src='..\profile_img\\{$row['picture']}' class='card-img-top'
style='width: 10rem;margin-left:0.5rem;border-radius:50%'>

<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup'
    aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
</button>
<div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
    <div class='navbar-nav text-light'>
        <h1 class='nav-link active text-light' aria-current='page'
            style='font-size:2.5rem;'>Hi<br> {$row['f_name']}
        </h1>
        <p class='nav-link active text-light' aria-current='page'
            style='font-size:2.3rem;font-family: 'Dancing Script' , cursive;'>{$row['email']}
</p>
<form method='POST'>
    <button class='btn ' name='Available'><a class=' nav-link active text-light' aria-current='page'
            style='font-size:1.7rem;font-family: ' Dancing Script', cursive;'>Available
            Pet</a></button>
    <button class='btn ' type='submit' name='All'><a class=' nav-link active text-light' aria-current='page'
            style='font-size:1.7rem;font-family: ' Dancing Script', cursive;'>All
            Pet</a></button>
    <button class='btn ' type='submit' name='Senior'><a class=' nav-link active text-light' aria-current='page'
            style='font-size:1.7rem;font-family: ' Dancing Script', cursive;'>Senior
            Pet</a></button>
            <button class='btn ' type='submit' name='Senior'><a href='.\create.php'class=' nav-link active text-light' aria-current='page'
            style='font-size:1.7rem;font-family: ' Dancing Script', cursive;'>Create</a></button>
    <button class='btn ' type='submit'><a class=' nav-link active text-light' aria-current='page' href='./logout.php?logout'
            style='font-size:1.7rem;font-family: ' Dancing Script', cursive;'>Log
            out</a></button>
</form>


</div>
</div>
</div>
</nav>";
}
} 



echo "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='preconnect' href='https://fonts.googleapis.com'>


    <style>
    body {
        background-image: url('https://static.vecteezy.com/system/resources/previews/001/849/553/original/modern-gold-background-free-vector.jpg');
        margin-: 0;

    }
    </style>
</head>
<body>

<div class='container mt-3'>

        <div class='row  gap-5 col-lg-12 col-md-10 col-sm-6'>";



if((isset($_POST['All']))){
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

       </div>
   </div>

";
}

}


} 

    
    
    if(isset($_POST['Senior'])){
    $sql = "SELECT `animal_id`,`image`, `name`, `location`, `age` FROM `animal` WHERE age>8 && status!='Adopted '";
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

                </div>
            </div>
            
            

    ";
    }

    }


    }


    ?><div class='container '>

    <div class='row  gap-5 col-lg-12 col-md-10 col-sm-6'>
        <?php
if(isset($_POST['Available'])){
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
                
            </div>
        </div>


";


}



}}







        echo "</div>
</div>
</div>
</div>
</div>
</div>
</body>

</html>";