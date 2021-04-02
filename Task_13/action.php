<?php

if(isset($_POST['submit'])){
    $image1 = $_POST['img_1'];
    $image2 = $_POST['img_2'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    if($height == 0 || $width == 0){
        echo "Please Enter a Valid size";
        echo"<a href='index.php'><h3 class='btn btn-primary'>Back..</h3></a>";
        die();
    }

    $folder = "/images/";
    $pic1 = $_FILES['img_1']["name"];
    $pic2 = $_FILES['img_2']["name"];
    move_uploaded_file($_FILES['img_1']["tmp_name"], "$folder".$pic1); 
    move_uploaded_file($_FILES['img_2']["tmp_name"], "$folder".$pic2); 


    function mergeImage(){
        $src = imagecreatefromjpeg($image1);
        $dst = imagecreatefromjpeg($image2);
        imagecopymerge($dst, $src, 0, 0, 0, 0, 540, 960, 30);
        header('Content-type: image/jpeg');
        imagejpeg($dst);
        imagedestroy($src);
        imagedestroy($dst);
    }
    mergeImage();
}else{
    echo "Could not merge images";
}

?>