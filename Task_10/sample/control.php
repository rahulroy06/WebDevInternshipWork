    <?php  
 $connect = mysqli_connect("localhost", "root", "", "task_10");  
 $number = count($_POST["label"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["label"][$i] != ''))  
           {  
                $sql = "INSERT INTO form_data(label,data_type,form_name) VALUES('".mysqli_real_escape_string($connect, $_POST["label"][$i])."',)";  
                mysqli_query($connect, $sql);  
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Re-Enter the data";  
 }  
 ?> 
   