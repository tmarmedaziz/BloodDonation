<?php 
    $id=$_GET['id'];
    $id_donor=$_GET['idd'];
    $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
    $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
    $res=mysqli_query($connect ,"DELETE  FROM appointement WHERE id='$id' ");
    if ($res==true) {
        header("Location: ../schedule.php");
        $res1=mysqli_query($connect ,"SELECT last_blood_sample FROM blood_donor WHERE id_donor='$id_donor'");              
        $row1=mysqli_fetch_assoc($res1);
        $last_blood_sample=$row1['last_blood_sample'];
        $res=mysqli_query($connect ,"UPDATE blood_donor SET blood_sample='$last_blood_sample ' , last_blood_sample=NULL WHERE id_donor = '$id_donor'");
    }

?>