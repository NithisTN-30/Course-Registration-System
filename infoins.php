<html>
<head>

<?php

include_once 'db1.php';

$Name=$_POST['nm'];
$Address=$_POST['add'];
$DOB=$_POST['dob'];
$Gender=$_POST['Gender'];
$Education_qualified=$_POST['edu'];
$Timing=$_POST['time'];
$Contact_No=$_POST['cont'];
$Course=$_POST['course'];

if(empty($Name&&$Address&&$DOB&&$Gender&&$Education_qualified&&$Timing&&$Contact_No&&$Course))
{
	
	echo "<script type='text/javascript'>alert('Fillup all the details..!!');</script>";
	include "register.php";	
	exit;
}



$query = "SELECT * FROM `reg` WHERE `Name` = '{$Name}'";
$query1 = "SELECT * FROM `reg` WHERE `Contact_No` = '{$Contact_No}'";
 
$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);

if ( mysqli_num_rows ($result )> 0 )
{

	if(mysqli_num_rows ($result1 )>0)
	{
    /* Name and Contact number already exists */
    echo "<script type='text/javascript'>alert('Name and contact number already exists...');</script>";
    include "register.php";
    }
}
else
{
	$res=mysqli_query($con,"INSERT  into reg values ('$Name','$Address','$DOB','$Gender','$Education_qualified','$Timing','$Contact_No','$Course')")or die('insertion problem')or die(mysql_error());
	echo "<script type='text/javascript'>alert('Registered Sucessfully..!!');</script>";
	include "image.php";


}

?>
</head>
</html>
