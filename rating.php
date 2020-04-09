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
  
</head>
<style type="text/css">
td{
	width:100%;
	margin-top:20px;
	height:auto;
	
	
	
}
</style>
<body style="margin-top:130px;"  >
<form  method="post" action=""  >
<center>
<h1> Enter the Rating</h1>
<table   cellspacing="10px"  >
<tr > <th > SELECT MOVIE </th></tr><tr> <td><?php
require("connect.php");
$q1="select * from movie_detail";
$result1=mysqli_query($con,$q1);
?><select name="num" >
<option value="-1">----Select----</option>
<?php
while($row=mysqli_fetch_array($result1))
{
	
	$movie=$row[1];

?>
<option value="<?php echo $row[0] ?> ">
<?php echo $row[1] ?>
</option>
<?php
}
?></td></tr>
<tr><th>Rating</th> </tr><tr> <td> <input type="number" name="rate"  step="0.01" required="required" min="1" max="5"/> </td></tr>
</table>
<tr> <td><input type="submit" id="b2" name="b2" value="Give Rating" class="btn btn-success" /></td></tr>
</center>
</form>
<?php
require("connect.php");
if(isset($_POST['b2']))
{
  
    $mno=$_POST["num"];
    if($mno=="-1"){
        echo '<script>alert("Please select any movie");window.location.href = "rating.php";</script>';
    }
    $rate=$_POST["rate"];
  //  echo $rate."<br>";
    $q="select * from movie_detail where ID='".$mno."'";
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_array($res)){
    $aver=$row[2];
    $user=$row[3];
}
$tot=$aver*$user;
//echo $tot."<br>";
   $user=$user+1;
   //echo $user."<br>";
   $tot=$tot+$rate;

    $aver=$tot/$user;
    $w=number_format((float)$aver, 2, '.', '')."<br>";
  
    $q="update movie_detail set average_rating=".$aver.", user=".$user." where ID=".$mno."";
$n=mysqli_query($con,$q);
if(!$n){
echo '<script>alert("Rating Updation Failed")</script>';
}
else{
     echo '<script>alert("Rating Updation Sucessfully");window.location.href = "index.php";</script>';
    
}
}
mysqli_close($con);
?>
</body>
</html>