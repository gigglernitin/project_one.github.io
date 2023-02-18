<?php
$insert = false;
if(isset($_POST['name'])){
 // set connection varible   
$srever = "localhost";
$username = "root";
$password = "";
// Create a database connection
$con = mysqli_connect($srever,$username,$password);
//check for connection
if(!$con){
    die("connection to this database failed due to ".mysqli_connect_error());
}
// echo"Success connecting to the db";

$name = $_POST["name"] ;
$gender=$_POST["gender"] ;
$age =$_POST["age"];
$email =$_POST["email"];
$phone =$_POST["phone"];
$desc =$_POST["desc"];
$sql ="INSERT INTO `usa trip`.`trip` (`Name`, `Age`, `gender`, `email`, `phone`, `other`, `dt`)
 VALUES ('$name', '$gender', '$age', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

// Execute the query
 if($con->query($sql) == true){
    // echo "Successfully inserted";

    // flag for successful inserction
    $insert =true;
 }
 else{
    echo "ERROR : $sql <br> $con->error";
 }
 //close the database connection
 $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel = "stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="lpu.jpg" alt="LPU">
    <div class="container">
        <h3>Welcome to LPU USA Trip form </h3>
        <p>Enter your details and submit to confirm your participation in this tip</p>
              <?php
              if($insert == true){
        echo "<p class='msg'>Thanks for submitting your form. We are happy to see you joing us for the USA trip </p>";
              }
              ?>
              <form action="" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your age">
                <input type="text" name="gender" id="age" placeholder="Enter your gender">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
                <button class="btn">submit</button>
              </form>
    </div>
    <script src="index.js"></script>
</body>
</html>