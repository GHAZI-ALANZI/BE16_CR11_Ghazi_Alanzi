<?php
session_start(); 
if (isset($_SESSION['user']) != "") {
  header("Location:home.php"); 
}
if (isset($_SESSION['adm']) != "") {
  header("Location:home.php"); 
}

require_once "..\components\bootst.php";

header("Refresh:3;url=home.php");
?>
<div class=" alert alert-success">
    <h1 class="text-center"> Good Bye</h1>


</div>