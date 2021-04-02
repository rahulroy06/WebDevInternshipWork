<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Series Generator</title>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">

<style>
div#code {
    width: 700px;
    border: 1px solid;
    padding: 20px;
    position: relative;
    margin-left: 11%;
}
.code-bar {
    border: 1px solid;
    width: 200px;
    text-align: center;
    padding: 20px;
    border-radius: 20px;
    margin-top: 20px;
}
</style>
</head>
<body>
    
<div class="container">
    <div class="col-md-3 col-lg-offset-3">
        <h1>Enter The Range Between Buttons</h1>
        <form action="index.php" method="POST">
        <input type="number" class="form-control" value="1" name="range" id="range"/>
        <br/>
        <br/>
        <br/>
    </div>


<?php
    if(isset($_POST['submit'])){
        $j = $_POST['input'];
        $k = $_POST['range'];
    }else{
        $j = 1;
        $k = 1;
    }
    $i = 1;
    for($i = 1; $i <= 10; $i++){
        if($i == 1){
            echo "Enter the starting Point";
            echo "<input type='number' style='width: 30px' name='input' event='new' value='".$j."' id='input'/>";
            echo "<input type='submit' value='genrate' name='submit'/></form>";
        }else {
            echo "<input type='button' id='j' value='".$j."' class='btn btn-primary'>";
            $j= $j+$k;
        }
    }
?>


        <div id="code">
            <h3>This is a code</h3>
                <?php
                    show_source('index.php');
                ?>
        </div>
        <div class="code-bar">
            <button id='show' class="btn btn-success">Generate Code</button>
            <br/>
            <br/>
            <button id='hide' class="btn btn-success">Hide Code</button>
        </div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
    $("#code").hide();
    
  $("#show").click(function(){
    $("#code").show(1000);
  });
  $("#hide").click(function(){
    $("#code").hide(1000);
  });


  $( "#input" )  
  .change(function () {  
    var k = $_POST['input'];
  })  
  .change();  
});


</script>