<link rel="stylesheet" href="new-admin.css" rel="stylesheet">
<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<?php include('partials/menu.php') ?>
<div class="contenent">
        <div class="wrapper">
            <form class="form" action="" method="POST">
                
            <h2>Admin Connexion</h2>
            
            <br >
                <table>
                    <tr>
                        <td>Username :</td>
                        <td><input class="form-input" type="text" name="username" placeholder="Username"></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input class="form-input" type="password" name="password" placeholder="Password"></td>
                    </tr>
                    <tr> <td>
                    <input class="submit-button" type="submit" name="submit" value="Connexion">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php
    if(isset($_POST['submit'])){
      //  session_start();
        $username=$_POST['username'];
        $password=$_POST['password'];     
        $password=md5($password);
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
        $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
        $res=mysqli_query($connect,$sql) or die("Error connceting to DataBase");
                    $nb_rows=mysqli_num_rows($res);
                    $rows=mysqli_fetch_assoc($res);
                    if ($nb_rows==1) {
                        $_SESSION['admin_connect']="<div class='add_success'>Admin Connected Successfully</div>";
                        $_SESSION['id']=$rows['id'];
                        $_SESSION['user']="admin";
                        $_SESSION['username']=$username;
                            echo "login success";
                            header("Location: admin-dashboard.php");

                      }
                      else{//$_SESSION['admin_connect']="<div class='delete_success'>Admin Connected Successfully</div>";}
                        //header("Location: admin-connexion.php");}
                    }
                }
                
            
?>
<?php include('partials/footer.php') ?>
