<?php

require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";
require_once "..\components\header.php";
require_once "uploud.php";


$fname="";
$lname="";
$email="";
$pass=$pass2="";
$status="";
$address="";
$tel="";

$ERROR=0;


if(isset($_POST['reg'])){
  $fname = trim($_POST['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);

  $lname = trim($_POST['lname']);
  $lname = strip_tags($lname);
  $lname = htmlspecialchars($lname);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $address = trim($_POST['address']);
  $address = strip_tags($address);
  $address = htmlspecialchars($address);

  $tel = trim($_POST['tel']);
  $tel = strip_tags($tel);
  $tel = htmlspecialchars($tel);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $pass2 = trim($_POST['pass2']);
  $pass2 = strip_tags($pass2);
  $pass2 = htmlspecialchars($pass2);

  $img = $filename . "." . $extension;
  
 


 
  
    if (empty($fname)) {
      
      $ERROR=1;
  
  }
  
  if (empty($lname)) {
    
  
  $ERROR=1;
  }

  
  
  if (empty($email)|| !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    $ERROR=1;
  
  
  }

  if (empty($address)) {
    
  
  $ERROR=1;
  }
  if (empty($tel)) {
    
  
  $ERROR=1;
  }
  
  
  if (empty($pass)|| preg_match("/^[a-zA-Z]+$/", $pass)) {
    
    $ERROR=1;
  
   }

     
  if (empty($pass2)|| preg_match("/^[a-zA-Z]+$/", $pass2)) {
    
    $ERROR=1;
  
  
  }
  if (empty($pass2)|| preg_match("/^[a-zA-Z]+$/", $pass2)) {
    
  
  $ERROR=1;
  
  }
  
  if ($_POST['pass2']!=$_POST['pass']){
    
    $ERROR=1;
  
  }
  
  $pass= hash('sha256', $pass);
  $pass2= hash('sha256', $pass2);
  
  if ($ERROR===0) {
    $status="user";
    $sql="INSERT INTO `users`( `picture`, `f_name`, `l_name`, `address`, `phone_number`, `email`, `pass`) VALUES ('$img','$fname','$lname','$address',' $tel',' $email','$pass') ";   
    $res=mysqli_query($conn,$sql);

   
    header("location:alert.php");
  
  }


}
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
    background-image: url("https://static.vecteezy.com/system/resources/previews/001/849/553/original/modern-gold-background-free-vector.jpg");
    margin-: 0;

}
</style>

<body>


    <section>
        <div class="container h-100  ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-light border-0 " style='background-color: rgba(0, 0, 0, 0.55);'>
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>




                                    <form class="mx-1 mx-md-4 " method="POST" enctype="multipart/form-data">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="fname"
                                                    class="form-control " required />

                                                <label class="form-label" for="form3Example1c">First Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="lname"
                                                    class="form-control " required />
                                                <label class="form-label" for="form3Example1c">Last Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="email"
                                                    class="form-control " required />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="address"
                                                    class="form-control " />
                                                <label class="form-label" for="form3Example3c">Address </label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-phone fa-lg me-3 fa-fw "></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="tel" class="form-control "
                                                    required />
                                                <label class="form-label" for="form3Example3c">Tel </label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-upload  fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="file" id="form3Example3c" name="img"
                                                    class="form-control " />
                                                <label class="form-label" for="form3Example3c">Uploud image</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="pass"
                                                    class="form-control " required />
                                                <label class="form-label " for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" name="pass2"
                                                    class="form-control " required />
                                                <label class="form-label text-<?= $error_color7?>"
                                                    for="form3Example4cd">Repeat your
                                                    password</label>
                                            </div>
                                        </div>



                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                name="reg">Register</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>