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
#admsn1{
	width:100%;
	margin-top:200px;
	height:auto;
	border:thick;
	border-color:#336;	
	
}
</style>
<br />
<br />
<br />
<br />
<br />
<br />
<div align="center" style="height:500px; width:500px; margin-left:400px">
<fieldset >
<legend align="center" ><h1>Movie Details</h1></legend>
<?php
require("connect.php");
$q="select * from movie_detail";
$res=mysqli_query($con,$q);
?>

<table width="500px" height="90%" class="table table-striped">
<tr> <th> ID </th><th>MOVIE NAME</th><th>AVERAGE RATING</th></tr>
<?php
while($row=mysqli_fetch_array($res))
{
	$id=$row[0];
$mname=$row[1];
$avg=$row[2];


?>
<tr><td><?php echo $id ?></td>
<td><?php echo $mname ?></td>
<td><?php echo $avg ?></td>
</tr>
<?php } ?>
</table>
<?php mysqli_close($con); ?>
</fieldset>
</div>
<body>
</body>
</html>