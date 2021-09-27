<?php
require_once("dbcontroller.php");
$db_handle = new DBController();




  $query = "select * FROM ids_concept";
    $result = $db_handle->executeQuery($query);
 
    $delimiter = ","; 
    $filename = "ids_concept" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Nume', 'Prenume', 'Serie Legitimatie', 'Data inscriere', 'Telefon', 'Email', 'Unitate'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
       
        $lineData = array($row['id'], $row['nume'], $row['prenume'], $row['serie_legitimatie'], $row['data_inscriere'], $row['telefon'], $row['email'], $row['unitate']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 



?>