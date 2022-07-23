<?php
session_start();
require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";
require_once "..\components\header.php";

    
        




$error = false;
$email = $password = '';

if (isset($_POST['log'])) {
    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    if (empty($email)) {
        $error = true;
       
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
    }

    if (empty($pass)) {
        $error = true;
    }

    // if there's no error, continue to login
    if (!$error) {


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
    }     
    
    //any one not admin or user it will be exit and end session!!!!!

else{session_destroy();
    exit();
    die();}


    
    }

    
    


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/User_icon-cp.svg/1200px-User_icon-cp.svg.png"
                                            style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">user</h4>
                                    </div>

                                    <form method="POST">

                                        <?php if($error==true){ echo "<div class=' alert alert-danger'><h4 class='text-center'> please insert valid data</h4> </div>";}?>



                                        <p>Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example11" class="form-control"
                                                placeholder="Phone number or email address" name="email" />
                                            <label class="form-label" for="form2Example11">Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example22" class="form-control"
                                                name="pass" />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit" name="log">Log
                                                in</button>

                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Dont have an account?</p>
                                            <button type="submit" class="btn btn-outline-danger"> <a
                                                    href="reg.php">Create
                                                    new</a> </button>
                                        </div>

                                    </form>

                                </div>
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