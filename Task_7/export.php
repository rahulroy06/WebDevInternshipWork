<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "task_3");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("csvfiles/output.csv", "w");  
      fputcsv($output, array('ID', 'Username', 'Password', 'User Type', 'Full Name', 'Status'));  
      $query = "SELECT * from users ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  

 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "task_3");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("includes/backup.csv", "w");  
      fputcsv($output, array('ID', 'Username', 'Password', 'User Type', 'Full Name', 'Status'));  
      $query = "SELECT * from users ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }
 


 ?>  