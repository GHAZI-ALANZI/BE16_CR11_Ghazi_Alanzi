<?php
require_once "..\components\bootst.php";
require_once "..\components\db_connect.php";
require_once "..\components\header.php";

if(isset($_POST['submit'])){
    $to = $_POST['email'];
    $subject = "feedback";
    $txt = $_POST['mes'];
    
    
   if(!empty($to) && !empty($subject)&&!empty($txt)) {mail($to,$subject,$txt);}}
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


    <!-- Default form contact -->
    <form class="text-center border border-0 text-light p-5 " method="POST"
        style='background-color: rgba(0, 0, 0, 0.55);'>

        <p class="h4 mb-4">Contact us</p>

        <!-- Name -->
        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

        <!-- Email -->
        <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

        <!-- Subject -->
        <label>Subject</label>
        <select class="browser-default custom-select mb-4">
            <option value="" disabled>Choose option</option>
            <option value="1" selected>Feedback</option>

        </select>

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"
                name="mes"></textarea>
        </div>



        <!-- Send button -->
        <button class="btn btn-info btn-block mt-5" type="submit" name="submit">Send</button>

    </form>
    <!-- Default form contact -->

</body>

</html>