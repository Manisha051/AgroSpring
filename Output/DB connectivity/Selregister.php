<?php
require "conn.php";

$badhar=$_POST["b_adhar"];
$bpassword=$_POST["b_password"];
$bname=$_POST["b_name"];
$bphone=$_POST["b_phone"];
$bgender=$_POST["b_gender"];
$bage=$_POST["b_age"];
$bdate=$_POST["b_date"];
$bstate=$_POST["b_state"];
$bdistrict=$_POST["b_district"];
$bcity=$_POST["b_city"];
$bad_line=$_POST["b_ad_line"];
$bpincode=$_POST["b_pincode"];


if($conn)
{
if(strlen($badhar)!=12)
{ echo"Please enter valid Adhar Id.";
}
else if(strlen($bpassword)>50||strlen($bpassword)<6)
{ echo"Password must be less than 50 and more than 6 characters";
}
else if(strlen($bphone)!=10)
{ echo"Please enter valid mobile no.";
}
else if(strlen($bpincode)!=6)
{ echo"Please enter valid Pincode";
}
else if(strlen($bage)<0)
{ echo"Invalid Age";
}
else
{ $sqlCheckbadhar="SELECT * FROM 'farmer' WHERE 'F_ID' LIKE '$badhar'";
$sellerIdQuery=mysqli_query($conn,$sqlCheckbadhar);

$sqlCheckbphone="SELECT * FROM 'farmer' WHERE 'CONTACT' LIKE '$bphone'";
$sellerPhoneQuery=mysqli_query($conn,$sqlCheckbphone);

if(mysqli_num_rows($sellerIdQuery)>0)
{ echo"User already exists, Please use another adhar Id";
}
else if(mysqli_num_rows($sellerPhoneQuery)>0)
{ echo"Mobile no. already in use, Please use another Mobile no.";
}
else{
$sql_register="INSERT INTO 'farmer' (`F_ID`,`F_NAME`,`PASSWORD`,`CONTACT`,`GENDER`,`DATE`,`STATE`,`DISTT`,`CITY`,`ADDRESS`,`PINCODE`) 
VALUES('$badhar','$bname','$bpassword','$bphone','$bgender','$bdate','$bstate','$bdistrict','$bcity','$bad_line','$bpincode')";
if(mysqli_query($conn,$sql_register))
{  echo"Successfully Registered";
}
else{
echo"Failed to Register";
}
}
}
}
else
{  echo"Connection Error";
}
?>