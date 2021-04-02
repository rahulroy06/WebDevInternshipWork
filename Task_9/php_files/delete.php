<?php
    session_start();
    include "db.php";
    // Deletes the entire selected row
        $db = new Db();
        $id = $_GET['id'];
        $delete = $db->delete($id);
        if($delete){
            header('location:pending.php');
        }else {
            echo "Error in Deletion";
        }
    
     
?>