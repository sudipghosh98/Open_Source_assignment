<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.error {color: #FF0000;}
</style>
</head>
<?php
$nameErr = $name ="";
$check=1;

require("connect.php");
if(isset($_POST['insert11']))
{  
    if (empty($_POST["movie"])) {
        $nameErr = "Name is required";
        $check=0;
      } else {
        $name = $_POST["movie"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
          $check=0;
        }
      }

      if($check==1){
    $mname=$_POST["movie"];
    $zero=0;

   

    $q="insert into movie_detail(movie_name,average_rating,user) values('".$mname."',".$zero.",".$zero.")";
$n=mysqli_query($con,$q);
if(!$n){
echo '<script>alert("Movie insertion failed")</script>';
}
else{
    echo '<script>alert("Movie insertion sucessfull");window.location.href = "index.php";</script>';
    
}
mysqli_close($con);
}  
}



?>
<body style="margin-top:130px;">
<form method="post" name="form1" action="" style="border:30px;height:500px;width:184;left-margin:500px;top:margin:500px;" >
<center>
<h1> Movie </h1>
<table  cellspacing="10px"  style="margin-top:50px;"  >

      
		
        <tr>
          <td> Enter Movie Name </td></tr>
          <tr>
          <td> <input type="text" name="movie" required="required" value="<?php echo $name;?>"/> </td>
          <td>  <span class="error" > <?php echo $nameErr;?></span></td>
        </tr>
        
          
		
        
      
       
		
        
</table>
<br />

          <input type="submit" name="insert11" value="  Save     " class="btn btn-success" />
          
 </center> 
</form>


</body>
</html>