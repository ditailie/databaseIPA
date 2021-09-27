<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["submit"])) {
    $query = "INSERT INTO ids_concept(nume, prenume, serie_legitimatie, telefon,email,unitate) VALUES('".$_POST["nume"]."','".$_POST["prenume"]."','".$_POST["serie_legitimatie"]."','".$_POST["telefon"]."','".$_POST["email"]."','".$_POST["unitate"]."')";
        $result = $db_handle->executeQuery($query);
    if(!$result){
			$message="Nu a fost adaugat.";
	} else {
			$message="A fost adaugat.";
			echo "<p class='success'>" . $message . "</p>";
	}

	
}
?>





<html>
	<head>
	<title>IDS-Concept / IT CONSULTANT</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body>
        
        
        
            <div class="row">
                <?php include('sidebar.php') ?>
                
                
                
                <div class="col-md-10 offset-md-2" style="margin-top:10px;padding-right:0px;">
                   
                           <form name="frmToy" method="post" action="" class="add_new">


<div class="row">
    <div class="col-md-6">
<input type="text" name="nume" placeholder="Nume" class="demoInputBox" required>
</div>
<div class="col-md-6">
<input type="text" name="prenume" placeholder="Prenume" class="demoInputBox" required>
</div>
<div class="col-md-6">
<input type="text" name="serie_legitimatie" placeholder="Serie Legitimatie" required class="demoInputBox">
</div>
<div class="col-md-6">
<input type="text" name="telefon" placeholder="Telefon" class="demoInputBox" required>
</div>
<div class="col-md-6">
<input type="email" name="email" placeholder="Email" class="demoInputBox" required>
</div>
<div class="col-md-6">
<input type="text" name="unitate" placeholder="Unitate" class="demoInputBox" required>
</div>


<div id="dynamic_field"></div>
<div class="col-md-1"></div>
<div class="col-md-4">

</div>
<div class="col-md-1"></div>
<div class="col-md-1"></div>
<div class="col-md-4">

<input type="submit" name="submit" id="btnAddAction" value="SUMBIT" />
</div>
<div class="col-md-1"></div>
</div>
                       
                    </form>
                    
                    
                </div>
                
            </div>
        
        

        
	</body>
</html>



