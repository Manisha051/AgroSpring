<?php
require "conn.php";
$badhar=$_POST["b_adhar"];
$bpassword=$_POST["b_password"];
if($conn)
{
if(strlen($badhar)!=12)
{ echo"Please enter valid Adhar Id.";
}
else if(strlen($bpassword)>50||strlen($bpassword)<6)
{ echo"Password must be less than 50 and more than 6 characters";
}
else
{ $sqlCheckbadhar="SELECT * FROM 'farmer' WHERE 'F_ID' LIKE '$badhar'";
$sellerIdQuery=mysqli_query($conn,$sqlCheckbadhar);

if(mysqli_num_rows($sellerIdQuery)>0)
{ $sqlLogin="SELECT * FROM 'farmer' WHERE 'F_ID' LIKE '$badhar' AND 'PASSWORD' 
LIKE '$bpassword'";
if(mysqli_num_rows($sqlLogin)>0)
{echo"Login Success";
}
else{
echo"Wrong Password";
}
}
else
{ 
echo"The adhar id is not registered";
}
}
}
else
{
echo"Connection Error";
}
?>