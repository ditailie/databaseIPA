<html>
	<head>
	<title>IDS-Concept / IT CONSULTANT</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body class="install_body">
        
        
        
         

<form method='post' action=''>
<div class="container_install">
    <div class="top_logo_install">
        
        <img src="media/logo.png">
        
    </div>
   <div class="row">

     <div class="col-md-4"><input type='text' name='dbuser' class="form-control" placeholder="Database User"></div>
     <div class="col-md-4"><input type='text' name='dbname' class="form-control" placeholder="Database Name"></div>
     <div class="col-md-4"><input type='text' name='dbpass' class="form-control" placeholder="Database Password"></div>
     
</div>
<div class="row">
<div class="col-md-1"></div>
    <div class="col-md-4"><button type="submit" class="button_install" name="remove">Remove Installer</button></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
     <div class="col-md-4"><button type="submit" class="button_install" name="submit">Submit</button></div>
     <div class="col-md-1"></div>
</div>  
</div>
  </form>
  
  
 <?php
 $filename = 'install.php';
    if (isset($_POST['submit'])) {


      $myfile = fopen("dbcontroller.php", "w") or die("Unable to open file");
      

      
      
      $dblocal ='<?php class DBController { private $host="localhost";' .  "\n";
      fwrite($myfile, $dblocal);
      
      
      $dbuser ='private $user = "' . $_POST['dbuser'].'";' . "\n";
      fwrite($myfile, $dbuser);
      
      $dbname ='private $database = "' . $_POST['dbname'].'";' . "\n";
      fwrite($myfile, $dbname);
      
      
      $dbpas ='private $password = "' . $_POST['dbpass'].'";' . "\n";
      fwrite($myfile, $dbpas);
      
      $full = 'private $conn;function __construct() {$this->conn = $this->connectDB();}function connectDB() {$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);return $conn;}function runQuery($query) {$result = mysqli_query($this->conn,$query);while($row=mysqli_fetch_assoc($result)) {$resultset[] = $row;}if(!empty($resultset))return $resultset;}function numRows($query) {$result  = mysqli_query($this->conn, $query);$rowcount = mysqli_num_rows($result);return $rowcount;}function executeQuery($query) {$result  = mysqli_query($this->conn, $query);return $result;}}?>';
       fwrite($myfile, $full);
       
       
       $servername = "localhost";
$username = $_POST['dbuser'];
$password = $_POST['dbpass'];
$dbname = $_POST['dbname'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);




 
$sql = "CREATE TABLE ids_concept (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,nume VARCHAR(255),prenume VARCHAR(255),serie_legitimatie VARCHAR(255),data_inscriere DATE DEFAULT CURRENT_DATE,telefon VARCHAR(255),email VARCHAR(255),unitate VARCHAR(255)) ENGINE=InnoDB;";
       $conn->query($sql);
       
      	$message="A fost adaugat.";
			echo "<p class='success'>" . $message . "</p>";
  
		
              
      
    }
    
    if(isset($_POST['remove'])){
        unlink($filename); //Remove install file
        
        
             header("Location:index.php");
        
    }
  ?>
