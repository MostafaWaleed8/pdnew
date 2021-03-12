<?php
session_start();
include("CONN.php");

    $email = mysqli_real_escape_string($conn,trim($_POST['email']));
    $password  = md5(mysqli_real_escape_string($conn,trim($_POST['password'])));
    $sql=mysqli_query($conn,"SELECT * FROM register where Email='$email' and Password='$password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"]=$row['Email'];
        echo "sisec";
    }
    else
    {
        echo "sifail";
    }



?>