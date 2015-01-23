<?php
include 'connect.php';

if (isset($_POST['sterge'])) {
    echo $_POST['sterge'];//verificare pe ce ramura intra
   foreach($_POST as $id => $value){
	if($id=='sterge'||$id=='modifica'){
		continue;}
	
	else 
	
        {   if($value=="on"){
            
           // echo $key."c";
            
            // sql to delete a record
            $sql = "DELETE FROM `ULBSPlatform`.`prezenta` WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            
        }
		
            
	}
} 
    
} elseif (isset($_POST['modifica'])) {
    echo $_POST['modifica'];
}
$conn->close();
?>