<?php



require_once ".\dashbord.php ";

// ************here just if i click on button show detail will details show on screen****************

if(!isset($_POST['Senior']) && !isset($_POST['All']) && !isset($_POST['Available'])){
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


//*****************just !!admin!! can add, change and creat new**************************************************


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
  
  $sql="UPDATE `animal` SET `name`='$name',`location`='$location',`description`='$description',`size`='$size',`age`='$age',`vaccinated`='$vaccinated',`breed`='$breed',`status`='$status' WHERE animal_id=$id";
  
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
                <h1 class='card-title'>Name:<input type='text' class='bg-dark text-light' value='{$row["name"]}'name='name'>
                </h1>
                <hr>
                <h4 class='card-title'>location:<input type='text' class='bg-dark text-light'
                        value='{$row["location"]}'name='loc'></h4>
                <hr>
                <h4 class='card-title'>Age: <input type='text' class='bg-dark text-light' value='{$row["age"]}'name='age'> years
                </h4>
                <hr>
                <h4 class='card-title'>description: <input type='text' class='bg-dark text-light'
                        value='{$row["description"]}'name='des'> </h4>
                <hr>
                <h4 class='card-title'>Size:<input type='text' class='bg-dark text-light' value='{$row["size"]}'name='si'> cm
                </h4>
                <hr>
                <h4 class='card-title'>Vaccinated: <select name='vac'>
                        <option value='Yes' name='vac'>Yes</option>
                        <option value='No' name='vac'>No</option>
                      
                      </select></h4>
                <hr>
                <h4 class='card-title'>Breed: <input type='text' class='bg-dark text-light' value='{$row["breed"]}'name='bre'>
                </h4>
                <hr>
                <h4 class='card-title'>Status: <select name='sta'>
                <option value='Available' name='sta'>Available</option>
                <option value='Adopted' name='sta'>Adopted</option>
              
              </select>
                </h4>
            </div>
        </div>
    </div>
</div>

<button type='submit' class='btn btn-danger mb-5 me-2' name='del'><h4>delete</h4></button>
<button type='submit' class='btn btn-primary mb-5 me-2'name='change'><h4>change</h4></button>
<button type='submit' class='btn btn-warning mb-5' ><a href='.\create.php' class='btn text-dark'>create</a></button>
</form>";}}


//*****************any one not admin it will be exit and end session!!!!!******************

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