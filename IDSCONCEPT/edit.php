<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["submit"])) {
    $query = "UPDATE ids_concept set `nume`='{$_POST["nume"]}',`prenume`='{$_POST["prenume"]}',`serie_legitimatie`='{$_POST["serie_legitimatie"]}',`telefon`='{$_POST["telefon"]}',`email`='{$_POST["email"]}',`unitate`='{$_POST["unitate"]}' WHERE  id={$_GET["id"]}";
    
    $result = $db_handle->executeQuery($query);
	if(!$result){
		$message="Nu a fost actualizat.";
	} else {
			$message="A fost actualizat.";
			echo "<p class='success'>" . $message . "</p>";
	}
}
$result = $db_handle->runQuery("SELECT * FROM ids_concept WHERE id='" . $_GET["id"] . "'");
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

<?php if( $result[0]): ?>
<div class="row">
    <div class="col-md-6">
<input type="text" name="nume" placeholder="Nume" class="demoInputBox" required value="<?php echo $result[0]["nume"];?>">

</div>
<div class="col-md-6">
<input type="text" name="prenume" placeholder="Prenume" class="demoInputBox" required value="<?php echo $result[0]["prenume"]; ?>">

</div>
<div class="col-md-6">
<input type="text" name="serie_legitimatie" placeholder="Serie Legitimatie" required class="demoInputBox" value="<?php echo $result[0]["serie_legitimatie"]; ?>">

</div>
<div class="col-md-6">
<input type="text" name="telefon" placeholder="Telefon" class="demoInputBox" required value="<?php echo $result[0]["telefon"]; ?>">

</div>
<div class="col-md-6">
<input type="email" name="email" placeholder="Email" class="demoInputBox" required value="<?php echo $result[0]["email"]; ?>">

</div>
<div class="col-md-6">
<input type="text" name="unitate" placeholder="Unitate" class="demoInputBox" required value="<?php echo $result[0]["unitate"]; ?>"> 

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
<?php endif ?>
                       
                    </form>
                    
                    
                </div>
                
            </div>
        
        

        
	</body>
</html>



