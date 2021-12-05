<?php 
    session_start();
    $id=$_GET['id'];
    $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
    $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
    $res=mysqli_query($connect ,"DELETE  FROM tbl_admin WHERE id=$id ");
    if ($res==true) {
        $_SESSION['del']="<div class='del_success'>Admin Deleted Successfully</div>";
        header("Location: admin-list.php");
    }

?>