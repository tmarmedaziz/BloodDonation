<link rel="stylesheet" href="new-admin.css" rel="stylesheet">
<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<?php include('partials/menu.php') ?>
<div class="contenent">
        <div class="wrapper">
            <form class="form" action="" method="POST">
                
            <h2>Change your password</h2>
            <br >
            
            <br >
                <table>
                    <tr>
                        <td>past password :</td>
                        <td>
                            <input class="form-input" type="password" name="pastpass" placeholder="type the past password">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>new password :</td>
                        <td>
                            <input class="form-input" type="password" name="newpass" placeholder="type your new password">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>new password again :</td>
                        <td>
                        <input class="form-input" type="password" name="renewpass" placeholder="retype your new password">
                            
                        </td>
                    </tr>
                    
                    <tr> <td>
                    <input class="submit-button" type="submit" name="submit" value="Save new password">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php include('partials/footer.php') ?>
<?php
    if (isset($_POST['submit'])){
        $id_admin=$_SESSION['id'];
        $pastpass=$_POST['pastpass'];
        $newpass=$_POST['newpass'];
        $renewpass=$_POST['renewpass'];
        if($pastpass&&$newpass&&$renewpass&&($newpass==$renewpass)){
        $sql="SELECT * FROM tbl_admin WHERE id='$id_admin'";
        $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
        $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
        $res=mysqli_query($connect,$sql) or die("Error connceting to DataBase");
                    $nb_rows=mysqli_num_rows($res);
                    $rows=mysqli_fetch_assoc($res);
                    if ($nb_rows==1) {
                        $checkpass=$rows['password'];
                        if(md5($pastpass)==$checkpass){
                            $newpass=md5($newpass);
                            $sql="UPDATE tbl_admin SET password='$newpass' WHERE id=$id_admin";
                            $res=mysqli_query($connect,$sql) or die("Error connceting to DataBase");
                            if($res==1){
                                header("Location: admin-dashboard.php"); 
                            }
                        }

                      }
    }
    else{ echo "please type all infos";}
}
?>