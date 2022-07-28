<?php



require_once ".\dashbord.php ";
@require_once ".\uploud_pet_img.php";


// ************here just if i click on button show detail will details show on screen****************

if(!isset($_POST['Senior']) && !isset($_POST['All']) && !isset($_POST['Available'])){


$sql="";
$name='';
$location="";
$description="";
$size="";
$age="";
$vaccinated="";
$breed="";
$status="";




if(isset($_SESSION['adm'])){



  
 

  
echo $table="

<div class='card mb-3 border-0 text-light' style='background-color: rgba(0, 0, 0, 0.55);'>
    <div class='row g-0'>
    <form method='POST' enctype='multipart/form-data'>

        <div class='col-md-5'>
        </div>
        <div class='col-md-8'>
            <div class='card-body'>
                <h1 class='card-title'>Name:<input type='text' class='bg-dark text-light' name='name'>
                </h1>
                <hr>
                <h4 class='card-title'>Uploud_image:<input type='file' class='bg-dark text-light' name='img' required>
                </h4>
                <hr>
                <h4 class='card-title'>location:<input type='text' class='bg-dark text-light'
                        name='loc'></h4>
                <hr>
                <h4 class='card-title'>Age: <input type='text' class='bg-dark text-light' name='age'> years
                </h4>
                <hr>
                <h4 class='card-title'>description: <input type='text' class='bg-dark text-light'
                    name='des'> </h4>
                <hr>
                <h4 class='card-title'>Size:<input type='text' class='bg-dark text-light' name='si'> cm
                </h4>
                <hr>
                <h4 class='card-title'>Vaccinated: <select name='vac'>
                <option value='Yes'name='Yes'>Yes</option>
                <option value='No'name='vac'>No</option>
                
              </select></h4>
                <hr>
                <h4 class='card-title'>Breed: <input type='text' class='bg-dark text-light' name='bre'>
                </h4>
                <hr>
                <h4 class='card-title'>Status: <select name='sta'>
                <option value='Adopted'name='sta'>Adopted</option>
                <option value='Available'name='sta'>Available</option>
                
              </select>
                </h4>
            </div>
        </div>
    </div>
</div>


<button type='submit' class='btn btn-warning mb-5'name='creat'><h2>create</h2></button>
</form>";}



    ;}
    if(isset($_POST['creat'])){
       
        $name=$_POST['name'];
        $location=$_POST['loc'];
        $description=$_POST['des'];
        $size=$_POST['si'];
        $age=$_POST['age'];
        $vaccinated=$_POST['vac'];
        $breed=$_POST['bre'];
        $status=$_POST['sta'];
        $img = $filename . "." . $extension;
    
        
        $sql=" INSERT INTO `animal`( `image`, `name`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`) VALUES ('$img','$name','$location','$description','$size','$age','$vaccinated','$breed','$status')";
        $result = mysqli_query($conn, $sql);
        header("Location: .\dashbord.php");

}


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