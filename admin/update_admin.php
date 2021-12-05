<link rel="stylesheet" href="new-admin.css" rel="stylesheet">
<?php include('partials/menu.php') ?>
<?php 
   // session_start();
    $id=$_GET['id'];
    $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
    $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
    $res=mysqli_query($connect ,"SELECT * FROM tbl_admin WHERE id='$id'");
    if ($res==TRUE) {
        $nb_rows=mysqli_num_rows($res);
        if ($nb_rows==1) {
            $rows=mysqli_fetch_assoc($res);
                $full_name=$rows['full_name'];
                $username=$rows['username'];
                $email=$rows['email'];
                $phone_number=$rows['phone_number'];
                
                }}
?>
    <div class="contenent">
        <div class="wrapper">
            <form class="form" action="" method="POST">
                
            <h2>Update Admin Infos</h2>
                <table>
                    <tr>
                        <td>Full Name :</td>
                        <td>
                            <input class="form-input" type="text" value="<?php echo $full_name; ?>" name="full-name" placeholder="<?php echo $full_name; ?>">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Username :</td>
                        <td><input class="form-input" type="text" value="<?php echo $username; ?>" name="username" placeholder="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input class="form-input" type="email" value="<?php echo $email; ?>" name="email" placeholder="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone Number :</td>
                        <td><input class="form-input" type="tel" value="<?php echo $phone_number; ?>" name="phone_number" placeholder="<?php echo $phone_number; ?>"></td>
                    </tr>
                    <tr> <td>
                    <input class="submit-button" type="submit" name="submit" value="Save">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
 <?php   if(isset($_POST['submit'])){
        $full_name=$_POST['full-name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phone_number=$_POST['phone_number'];
        $sql="UPDATE tbl_admin SET full_name='$full_name' ,username='$username' ,email='$email',phone_number='$phone_number' WHERE id=$id";
        $res=mysqli_query($connect,$sql) or die("Error connceting to DataBase");
        
                if ($res==1) { 
                    $_SESSION['update']="<div class='add_success'>Admin Infos are updated Successfully</div>";
                    
                    header("Location: admin-list.php");  
                }}
                
            
        ?>
<?php include('partials/footer.php') ?>
