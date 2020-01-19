<?php
require "conn.php";

$badhar=$_POST["b_adhar"];
$bcategory=$_POST["category"];
$bcrop=$_POST["crop"];
$bvariety=$_POST["variety"];
$bwholesale_qty=$_POST["wholesale_qty"];
$bwholesale_price=$_POST["wholesale_price"];
$bretail_qty=$_POST["retail_qty"];
$bretail_price=$_POST["retail_price"];
$courier=$_POST["courier"];
$byVisit=$_POST["byVisit"];


if($conn)
{
if(strlen($badhar)!=12)
{ echo"Please enter valid Adhar Id.";
}
else{
$sql_upload="INSERT INTO 'uploadcrop' (`F_ID`,`CATEGORY`,`CROP`,`VARIETY`,`WHOLESALE_MIN_QTY`,`WHOLESALE_PRICE`,`RETAIL_MIN_QTY`,`RETAIL_PRICE`,`COURIER`,`BY_VISIT`) 
VALUES('$badhar','$bcategory','$bcrop','$bvariety','$bwholesale_qty','$bwholesale_price','$bretail_qty','$bretail_price','$courier','$byVisit')";
if(mysqli_query($conn,$sql_upload))
{  echo"Successfully Uploaded";
}
else{
echo"Failed to Upload";
}
}
}
else
{  echo"Connection Error";
}
?>