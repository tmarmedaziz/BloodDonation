<link rel="stylesheet" href="new-admin.css" rel="stylesheet">

<?php include('partials/menu.php') ?>
    <div class="contenent">
        <div class="wrapper">
            <form class="form" action="" method="POST">
                
            <h2>Add a new Admin</h2>
                <table>
                <tr>
                        <td>CIN :</td>
                        <td>
                            <input class="form-input" type="text" name="id" placeholder="type your CIN">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Full Name :</td>
                        <td>
                            <input class="form-input" type="text" name="full-name" placeholder="type your name">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Username :</td>
                        <td><input class="form-input" type="text" name="username" placeholder="type your username"></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input class="form-input" type="email" name="email" placeholder="type your email"></td>
                    </tr>
                    <tr>
                        <td>Phone Number :</td>
                        <td><input class="form-input" type="tel" name="phone_number" placeholder="phone number"></td>
                    </tr>
                    <tr>
                        <td>
                            Sexe :
                        </td>
                        <td> <div class="form-other">
                            <input type="radio" id="huey" name="sexe" value="male" checked>
                            <label for="huey">male</label>
                            <input type="radio" id="hueye" name="sexe" value="female">
                            <label for="hueye">female</label></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Date of birth :</td>
                        <td><input class="form-other" type="date" name="date_of_birth" value="2018-07-22"></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input class="form-input" type="password" name="password" placeholder="type your password"></td>
                    </tr>
                    <tr>
                        <td>Confirm your password :</td>
                        <td><input class="form-input" type="password" name="repeated_password" placeholder="type your password again"></td>
                    </tr>
                    <tr> <td>
                    <input class="submit-button" type="submit" name="submit" value="Add">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php include('partials/footer.php') ?>
</body>

<?php
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $full_name=$_POST['full-name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phone_number=$_POST['phone_number'];
        $sexe=$_POST['sexe'];
        $date_of_birth=$_POST['date_of_birth'];
        $password=$_POST['password'];
        $repeated_password=$_POST['repeated_password'];
        if($full_name&&$username&&$sexe&&$password&&$repeated_password&&$date_of_birth&&$sexe&&$phone_number){
            if($repeated_password==$password){
                
                $password=md5($password);
                $sql="INSERT INTO tbl_admin SET id='$id', full_name='$full_name' ,username='$username' ,sexe='$sexe' ,password='$password',date_of_birth='$date_of_birth',email='$email',phone_number='$phone_number'";
                $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
                $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
                $query=mysqli_query($connect ,"SELECT * FROM tbl_admin WHERE username='$username'");
                $nb_rows=mysqli_num_rows($query);
                if ($nb_rows==0) {
                $res=mysqli_query($connect,$sql) or die("Error connceting to DataBase");
                if ($res==1) { 
                    $_SESSION['add']="<div class='add_success'>New Admin Added Successfully</div>";
                    
                    header("Location: admin-list.php");  
                }}
                else{$msg= "username already used";}
            }
            else{$msg= "Please check that you have entred the same password ";}}
        else{$msg ="there are missing infos";}
         ?>
         <script>swal("<?php echo $msg; ?>");</script>
<?php
       // echo $sql="INSERT INTO tbl_admin SET full_name='$full_name' ,username='$username' ,sexe='$sexe' ,password='$password'";
        
    }

?>
