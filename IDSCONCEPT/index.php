<?php

	require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$nume = "";
	$prenume = "";
	$serie = "";
	$data = "";
	$telefon = "";
	$email = "";
	$unitate = "";
	
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("nume","prenume","serie","data","telefon","email","unitate");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
			
					case "nume":
						$nume = $v;
						$queryCondition .= "nume LIKE '%{$v}%' ";
						break;
						
							case "prenume":
						$prenume = $v;
						$queryCondition .= "prenume LIKE '%{$v}%' ";
						break;
						
							case "serie":
						$serie = $v;
						$queryCondition .= "serie_legitimatie LIKE '%{$v}%' ";
						break;
						
							case "data":
						$data = $v;
						$queryCondition .= "data_inscriere LIKE '%{$v}%' ";
						break;
						
							case "telefon":
						$telefon = $v;
						$queryCondition .= "telefon LIKE '%{$v}%' ";
						break;
						
							case "email":
						$email = $v;
						$queryCondition .= "email LIKE '%{$v}%' ";
						break;
						
							case "unitate":
						$unitate = $v;
						$queryCondition .= "unitate LIKE '%{$v}%' ";
						break;
				}
			}
		}
	}
	$orderby = " ORDER BY id desc"; 
	$sql = "SELECT * FROM ids_concept " . $queryCondition;
	$href = 'index.php';					
		
    
	$query =  $sql . $orderby ; 
	$result = $db_handle->runQuery($query);
	
	$count_person="SELECT count(id) as persontotal from ids_concept";


		$result_person = $db_handle->runQuery($count_person);
			$result_person = $result_person['0'];
	
	
		$departments_all_sql="SELECT count(distinct unitate) as departments from ids_concept";


		$departments_all = $db_handle->runQuery($departments_all_sql);
			$departments_all = $departments_all['0'];
			
			$current_date = date("Y-m-d");
		$new_person_sql="SELECT COUNT(data_inscriere) as newperson FROM ids_concept WHERE data_inscriere = '{$current_date}'";


		$new_person = $db_handle->runQuery($new_person_sql);
			$new_person = $new_person['0'];	
	
	
	
	$unitate_sql = "select distinct unitate from ids_concept";
	
		$unitate_all = $db_handle->runQuery($unitate_sql);
	

?>
<html>
	<head>
	<title>IDS-Concept / IT CONSULTANT</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>
	<body>
        
        
        
            <div class="row">
                <?php include('sidebar.php') ?>
                
                
                
                <div class="col-md-10 offset-md-2" style="margin-top:10px;padding-right:0px;">
                    <div class="row top_row">
                        <div class="col-md-4">
                            <div class="background_all">
<svg class="icon" viewBox="0 0 24 24">
    <path fill="currentColor" d="M16.5,12A2.5,2.5 0 0,0 19,9.5A2.5,2.5 0 0,0 16.5,7A2.5,2.5 0 0,0 14,9.5A2.5,2.5 0 0,0 16.5,12M9,11A3,3 0 0,0 12,8A3,3 0 0,0 9,5A3,3 0 0,0 6,8A3,3 0 0,0 9,11M16.5,14C14.67,14 11,14.92 11,16.75V19H22V16.75C22,14.92 18.33,14 16.5,14M9,13C6.67,13 2,14.17 2,16.5V19H9V16.75C9,15.9 9.33,14.41 11.37,13.28C10.5,13.1 9.66,13 9,13Z" />
</svg>
                                
                                <p>Persons<br /><span><?php echo $result_person['persontotal'] ?></span></p>
                            </div>
                        </div>
                          
                                                <div class="col-md-4">
                            <div class="background_all">
<svg class="icon" viewBox="0 0 24 24">
    <path fill="currentColor" d="M10,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V8C22,6.89 21.1,6 20,6H12L10,4Z" />
</svg>
                                
                                <p>Departments<br /><span><?php echo $departments_all['departments']?></span></p>
                            </div>
                        </div>
                        
                                                <div class="col-md-4">
                            <div class="background_all">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" />
                                </svg>
                                
                                <p>New Persons Today<br /><span><?php echo $new_person['newperson']?></span></p>
                            </div>
                        </div>
                 
                    </div>
                    
                    
                    
                    
                                        <div class="row padding15">
               <div class="col-md-12">
            <div class="background_container">       
                   
                   			<form name="frmSearch" method="post" action="">


	
			
			<table cellpadding="5" cellspacing="1" width="100%">
        <thead>
        
    
    
    
 
            
<tr>
<th><strong>ID</strong></th>					    
<th><input type="text" placeholder="Nume" name="search[nume]" class="demoInputBox" value="<?php echo $nume; ?>"	/></th>
			<th><input type="text" placeholder="Prenume" name="search[prenume]" class="demoInputBox" value="<?php echo $prenume; ?>"	/></th>
			<th><input type="text" placeholder="Serie" name="search[serie]" class="demoInputBox" value="<?php echo $serie; ?>"	/></th>
			<th><input type="text" placeholder="Data" name="search[data]" class="demoInputBox" value="<?php echo $data; ?>"	/></th>
			<th><input type="text" placeholder="Telefon" name="search[telefon]" class="demoInputBox" value="<?php echo $telefon; ?>"	/></th>
			<th><input type="text" placeholder="Email" name="search[email]" class="demoInputBox" value="<?php echo $email; ?>"	/></th>
			
			
			<th>
			    <select name="search[unitate]">
			        <option style="color:#000000;" disabled="disabled" value="" selected="true" >Alege Unitatea</option>
			        <?php if($unitate_all):?>
			        <?php foreach($unitate_all as $value):?>
			        <option style="color:#000000;" value="<?php echo $value['unitate']?>"><?php echo $value['unitate']?></option>
			           <?php endforeach ?>
			           <?php endif?>
			    </select>
			    
			</th>
			
			
			<th><input type="submit" name="go" class="btnSearch" value="Search"></th>

</tr>

            
				</thead>
				<tbody>
				    <?php if($result):?>
					<?php foreach($result as $k=>$v):?>
		
          <tr>
              <td style="text-align:center;"><?php echo $result[$k]["id"]; ?></td>
					<td><?php echo $result[$k]["nume"]; ?></td>
          <td><?php echo $result[$k]["prenume"]; ?></td>
					<td><?php echo $result[$k]["serie_legitimatie"]; ?></td>
					<td><?php echo $result[$k]["data_inscriere"]; ?></td>
					<td><?php echo $result[$k]["telefon"]; ?></td> 
					<td><?php echo $result[$k]["email"]; ?></td> 
					<td><?php echo $result[$k]["unitate"]; ?></td> 
					<td>
					<a class="btnEditAction" href="edit.php?id=<?php echo $result[$k]["id"]; ?>"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
</svg></a> <a class="btnDeleteAction" href="delete.php?action=delete&id=<?php echo $result[$k]["id"]; ?>"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
</svg></a>
					</td>
					</tr>
					<tr>
					    <td class="border_light" colspan="9" style="padding:1px;">
					  
					  </td>
					</tr>
					<?php endforeach ?>
					<?php endif?>
				<tbody>
			</table>
			</form>	
            </div>       
                   
               </div>
          
                    </div>
                    
                </div>
                
            </div>
        
        
        
	</body>
</html>