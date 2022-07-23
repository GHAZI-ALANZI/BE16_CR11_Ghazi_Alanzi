<?php
require_once "bootst.php";
require_once "db_connect.php";
$data="";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .cont {
        height: 100vh;
        width: 100vw;
        background-image: url("https://img.wallpapersafari.com/desktop/1920/1080/54/28/k2J6SB.jpg");
        background-size: cover;
    }
    </style>

</head>

<body>
    <?php require_once("bootst.php") ;
require_once("db_connect.php");
$sql = "SELECT * from users";
$result = mysqli_query($conn, $sql);
$table = "";


?>








    <div class="cont  ">
        <div class="row  ">
            <h1 class="text-light text-center p-4"> dashboard</h1>

            <div class="col-12 ">
                <table class="table ">
                    <thead>
                        <tr class="bg-dark text-light  ">

                            <th scope='col '>id</th>
                            <th scope='col'>fname</th>
                            <th scope='col'>lname</th>
                            <th scope='col'>email</th>
                            <th scope='col'>pass</th>
                            <th scope='col'>status</th>

                        </tr>
                    </thead>
                    <?php 
$sql = "SELECT * FROM `users` ";
$result = mysqli_query($conn, $sql);
$table ="";

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    
    


     echo $table="
     
     <form action='table.php' method='POST' class= 'text-light '>

     <tbody>
      <tr class='bg-info text-light '>
      <th scope='col'>".$row['id']."</th>
        <th scope='col'>".$row['fname']."</th>
        <th scope='col'>".$row['lname']."</th>
        <th scope='col'>".$row['email']."</th>
        <th scope='col'>".$row['pass']."</th>
        <th scope='col'>".$row['status']."</th>
        <th scope='col'>
        <a href='delete.php?id={$row["id"]}' class='btn btn-danger mb-2'>delete</a>
        <a href='update.php?id={$row["id"]}' class='btn btn-primary mb-2'>update</a>
        <a href='details.php?id={$row["id"]}' class='btn btn-success  '>show details</a>


        </th>
        

      </tr></form>";
  }
  }else{
     echo $table= "<tr '><td colspan='12'><h3 class='text-center'>No Data Available </h3></td></tr>";
  }

?>
                    </tbody>

                </table>
            </div>
        </div>






</body>

</html><?php


$id=$_GET['id'];

 
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
                <h1 class='card-title'>{$row["name"]}</h1>
                <hr>
                <h4 class='card-title'>location:{$row["location"]}</h4>
                <hr>
                <h4 class='card-title'>Age: {$row["age"]} years</h4>
                <hr>
                <h4 class='card-title'>description: {$row["description"]} </h4>
                <hr>
                <h4 class='card-title'>Size: {$row["size"]} cm</h4>
                <hr>
                <h4 class='card-title'>Vaccinated: {$row["vaccinated"]} </h4>
                <hr>
                <h4 class='card-title'>Breed: {$row["breed"]} </h4>
                <hr>
                <h4 class='card-title'>Status: {$row["status"]} </h4>
            </div>
        </div>
    </div>
</div>";?>















echo $table="

<div class='card mb-3 border-0 text-light' style='background-color: rgba(0, 0, 0, 0.55);'>
    <div class='row g-0'>
        <div class='col-md-5'>
            <img src='..\pictures\\{$row["image"]}' class='img-fluid rounded-start'>
        </div>
        <div class='col-md-8'>
            <div class='card-body'>
                <h1 class='card-title'>Name:<input type='text' class='bg-dark text-light' value='{$row["name"]}'>
                </h1>
                <hr>
                <h4 class='card-title'>location:<input type='text' class='bg-dark text-light'
                        value='{$row["location"]}'></h4>
                <hr>
                <h4 class='card-title'>Age: <input type='text' class='bg-dark text-light' value='{$row["age"]}'> years
                </h4>
                <hr>
                <h4 class='card-title'>description: <input type='text' class='bg-dark text-light'
                        value='{$row["description"]}'> </h4>
                <hr>
                <h4 class='card-title'>Size:<input type='text' class='bg-dark text-light' value='{$row["size"]}'> cm
                </h4>
                <hr>
                <h4 class='card-title'>Vaccinated: <input type='text' class='bg-dark text-light'
                        value='{$row["vaccinated"]} '></h4>
                <hr>
                <h4 class='card-title'>Breed: <input type='text' class='bg-dark text-light' value='{$row["breed"]}'>
                </h4>
                <hr>
                <h4 class='card-title'>Status: <input type='text' class='bg-dark text-light' value='{$row["status"]} '>
                </h4>
            </div>
        </div>
    </div>
</div>
<form method='POST'>
    <button type='submit' class='btn btn-danger mb-5' name='del'>delete</button>
    <button type='submit' class='btn btn-danger mb-5' name='change'>change</button>
    <button type='submit' class='btn btn-danger mb-5' name='add'>add</button>
</form>