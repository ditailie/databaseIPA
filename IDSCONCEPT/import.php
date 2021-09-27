<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 1000000000, ",")) !== FALSE)
           {

if($getData[0]!= 'nume' && $getData[1] != 'prenume' && $getData[2] != 'serie_legitimatie' && $getData[3] != 'telefon' && $getData[4] != 'email' && $getData[5] != 'unitate' ){
             $sql = "INSERT into ids_concept (nume,prenume,serie_legitimatie,telefon,email,unitate) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."')";
                           $result = $db_handle->executeQuery($sql);
                           
                           
                                   if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
}
                   

           }
      
           fclose($file);  
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
                 <form action="" method="post" name="upload_excel" enctype="multipart/form-data">
                   <div class="row import_add">
                 
               <div class="col-md-6">
                            
                                <input type="file" name="file" id="file" class="input-large">
                      </div>
                      <div class="col-md-6">
                                <button type="submit" id="submit" name="Import" data-loading-text="Loading...">Import</button>
</div>                           
                
                    </div>
                    </form>
                </div>
                
            </div>
        
        

        
	</body>
</html>


