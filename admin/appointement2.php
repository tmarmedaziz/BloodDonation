
<?php 
    session_start();
    $time_slot=$_GET['time'];
    $id=$_GET['id'];
    $date=$_GET['date'];
    $id_admin=$_SESSION['id'];
    $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
    $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
    $res=mysqli_query($connect ,"SELECT * FROM blood_donor WHERE id_donor='$id'");
    if ($res==TRUE) {
        $nb_rows=mysqli_num_rows($res);
        if ($nb_rows==1) {
            $rows=mysqli_fetch_assoc($res);
                $full_name=$rows['full_name'];
                $city=$rows['city'];
                $email=$rows['email'];
                $phone_number=$rows['phone_number'];
                $last_blood_sample=$rows['last_blood_sample'];
                $blood_sample=$rows['blood_sample'];
                $res=mysqli_query($connect ,"SELECT * FROM tbl_admin WHERE id='$id_admin'");
                $rows1=mysqli_fetch_assoc($res);
                $full_name_admin=$rows1['full_name'];
              /*  if ($last_blood_sample==NULL) {
                    $msg="This is the first time ".$full_name." is going to Donate";
                }
                else {
                  $msg="The last time ".$full_name." Donated was ".strval($last_blood_sample);
                }*/
                echo $blood_sample;
                
                $sql1="INSERT INTO appointement SET id_donor='$id', date_app='$date', id_admin='$id_admin', city='$city',time_slot='$time_slot'";
                $res1=mysqli_query($connect ,$sql1);
                $sql1="UPDATE blood_donor SET last_blood_sample = '$blood_sample' , blood_sample='$date' WHERE id_donor = '$id'";
                $res1=mysqli_query($connect ,$sql1);

// The message
$message = " Hi, Mr ".$full_name." your appointment for blood donation will be ".$date." on ".$time_slot.".\n Your Admin is ".$full_name_admin."\n Please be there on time \n Best regards.";

mail($email, 'Blood Donation Appointment', $message);

                
                header("Location: view_donors.php");
                }}

?>
