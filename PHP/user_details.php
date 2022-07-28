<?php


require_once ".\user.php ";

// ************here just if i click on button show detail will details show on screen****************

if(!isset($_POST['Senior']) && !isset($_POST['All']) && !isset($_POST['Available'])){
$id=$_GET['id'];




//*****************just !!user!! can see that**************************************************


if(isset($_SESSION['user'])){

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

 

  
echo $table="

<div class='card mb-3 border-0 text-light' style='background-color: rgba(0, 0, 0, 0.55);'>
    <div class='row g-0'>

        <div class='col-md-5'>
            <img src='..\pictures\\{$row["image"]}' class='img-fluid rounded-start'>
        </div>
        <div class='col-md-8'>
            <div class='card-body'>
                <h1 class='card-title'>Name:{$row["name"]}</h1>
                <hr>
                <h4 class='card-title'>location:{$row["location"]}</h4>
                <hr>
                <h4 class='card-title'>Age: {$row["age"]} years
                </h4>
                <hr>
                <h4 class='card-title'>description: {$row["description"]} </h4>
                <hr>
                <h4 class='card-title'>Size:{$row["size"]} cm
                </h4>
                <hr>
                <h4 class='card-title'>vaccinate: {$row["vaccinated"]} 
                </h4>
                <hr>
                <h4 class='card-title'>Breed: {$row["breed"]}</h4>
                <hr>
                <h4 class='card-title'>status: {$row["status"]} 
                </h4><hr>
                <a href='./adopt.php?id={$row["animal_id"]}' class='btn btn-warning'>take me home</a>
            </div>
        </div>
    </div>
</div>

";}}


//*****************any one not user it will be exit and end session!!!!!******************

if(!isset($_SESSION['user'])){
  header("location:home.php");
  session_unset();
  session_destroy();
    exit();
    die();
  }



  


?>

</body>

</html>