<?php




    require_once ".\user.php ";

$id2=$_GET['id'];

//**********just user can loin in to adopt.php********************
if (!isset($_SESSION["user"])) {
    unset($_SESSION['user']);
   session_unset();
    session_destroy();
    header("Location: home.php");
    exit;
  }



// ************here just if i click on button show detail will details show on screen****************

if(!isset($_POST['Senior']) && !isset($_POST['All']) && !isset($_POST['Available'])){
    $id2=$_GET['id'];
    
    $sql="";
    $name='';
   
    
    $sql = "SELECT * FROM `animal` where animal_id=$id2 ";
    $result = mysqli_query($conn, $sql);
    $table ='';
    $row = mysqli_fetch_assoc($result);
    
   //**********just user can loin in to adopt.php**************************************************************************

    if(isset($_SESSION['user'])){
    $dat=date('y-m-d');//*****get the current date to add it to adopt table in db*****************************************************
   
     if(isset($_POST['adopt'])){
        $sql=" INSERT INTO `pet_adoption`(`user_id`,`pet_id`,`adoption_date`) VALUES ('$id','$id2','$dat')";
        $result = mysqli_query($conn, $sql);
        header("Location: user.php");
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
                    <h1 class='card-title'>Name:{$row["name"]}
                    </h1>
                    <hr>
                      
    <button type='submit' class='btn btn-warning mb-5'name='adopt'><h1>Adopt now</h1></button>
    </form>
                </div>
            </div>
        </div>
    </div>"
  ;}}
    
    
    //*****************any one not admin it will be exit and end session!!!!!*******************************************************************************
    
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