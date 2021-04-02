<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image Merge</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form class="form-control col-md-6 col-md-offset-4" action="action.php" method="post">
            <center><h1>Image Merge</h1></center>
            <label>Upload First Image</label>
            <input type="file" name="img_1" class="form-control" required=""/>
            <label>Upload Second Image</label>
            <input type="file" name="img_2" class="form-control" required=""/>
            <h3>Set Your Own Size</h3>
            <label>Hirizontal(Pixels)</label>
            <input type="number" name="width" placeholder="e.g. 200" class="form-control" required=""/>
            <label>Vertical (Pixels)</label>
            <input type="number" name="height" placeholder="e.g. 200" class="form-control" required=""/> 
            <input type="submit" name="submit" value="CREATE IMAGE" class="btn btn-success form-control" />
        </form>
    </div>
</body>
</html>