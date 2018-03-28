<?php

$servername = "localhost";
$username = "root";
$password = "root";
$db="db_clientaddressbook";
$conn=mysqli_connect($servername,$username,$password,$db);
if (!$conn) {
    die("connection failed: ".mysqli_connect_error()) ;
}

else {
   // echo "  connected successfully inside else    ";
    
}

function OpenCon()
{


try {
    $conn=mysqli_connect($servername,$username,$password,$db);
    if (!$conn) {
        die("connection failed: ".mysqli_connect_error()) ;
    }
    
    else {
        echo "  connected successfully inside else    ";
    
    }
}
catch(PDOException $e)
{
    echo "ssss failed: ";
}
return $conn;
}



function CloseCon($conn)
{
    $conn -> close();
}
?>