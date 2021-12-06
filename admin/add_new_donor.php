<link rel="stylesheet" href="new-admin.css" rel="stylesheet">
<?php include('partials/menu.php') ?>
<?php
    if(isset($_POST['submit'])){
        $full_name=$_POST['full-name'];
        $id_donor=$_POST['cin'];
        $email=$_POST['email'];
        $phone_number=$_POST['phone_number'];
        $sexe=$_POST['sexe'];
        $date_of_birth=$_POST['date_of_birth'];
        $blood_type=$_POST['blood_type'];
        $city=$_POST['city'];
        $id_admin=$_SESSION['id'];
        //echo $_SESSION['id'];
     if($full_name&&$id_donor&&$sexe&&$email&&$blood_type&&$date_of_birth&&$phone_number&&$city){
                
               // $password=md5($password);

                $sql="INSERT INTO blood_donor SET full_name='$full_name' ,id_donor='$id_donor' ,sexe='$sexe' ,blood_type='$blood_type',date_of_birth='$date_of_birth',email='$email',phone_number='$phone_number',id_admin='$id_admin',city='$city'";
                $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
                $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error()); 
                $res=mysqli_query($connect,$sql) or die("Error connceting to DataBase");
                if ($res==1) { 
                    $_SESSION['add']="<div class='add_success'>New donor Added Successfully</div>";
                  //  echo "";
                    header("Location: admin-dashboard.php");  
                }
                else{$msg= "username already used";}
            }
        else{$msg ="there are missing infos";}
    }
         ?>
<div class="contenent">
        <div class="wrapper">
            <form class="form" action="" method="POST">
                
            <h2>Add a new Donor</h2>
            <br >
            
            <br >
                <table>
                    <tr>
                        <td>CIN number :</td>
                        <td>
                            <input class="form-input" type="tel" name="cin" placeholder="type CIN number">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Full Name :</td>
                        <td>
                            <input class="form-input" type="text" value="<?php if(isset($_GET['fn'])){echo $_GET['fn'];} ?>" name="full-name" placeholder="type your name">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Blood type :</td>
                        <td>
                            <select id="blood_type" class="form-input" name="blood_type">
                                <option value="no">Not yet</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                            
                        </td>
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
                        <td>Phone Number :</td>
                        <td><input class="form-input" type="tel" value="<?php if(isset($_GET['phone_number'])){echo $_GET['phone_number'];} ?>" name="phone_number" placeholder="phone number"></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input class="form-input" type="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" name="email" placeholder="type your email"></td>
                    </tr>
                    <tr>
                        <td>City :</td>
                        <td>
                        <select id="city" class="form-input" name="city">
                                <option value="Ariana">Ariana</option>
                                <option value="Beja">Beja</option>
                                <option value="Ben Arous">Ben Arous</option>
                                <option value="Bizerte">Bizerte</option>
                                <option value="Gabes">Gabes</option>
                                <option value="Gafsa">Gafsa</option>
                                <option value="Jendouba">Jendouba</option>
                                <option value="Kairouan">Kairouan</option>
                                <option value="Kasserine">Kasserine</option>
                                <option value="Kebili">Kebili</option>
                                <option value="Kef">Kef</option>
                                <option value="Mahdia">Mahdia</option>
                                <option value="Manouba">Manouba</option>
                                <option value="Medenine">Medenine</option>
                                <option value="Monastir">Monastir</option>
                                <option value="Nabeul">Nabeul</option>
                                <option value="Sfax">Sfax</option>
                                <option value="Sidi Bouzid">Sidi Bouzid</option>
                                <option value="Siliana">Siliana</option>
                                <option value="Sousse">Sousse</option>
                                <option value="Tataouine">Tataouine</option>
                                <option value="Tozeur">Tozeur</option>
                                <option value="Tunis">Tunis</option>
                                <option value="Zaghouane">Zaghouane</option>
                            </select>
                            
                        </td>
                    </tr>
                    <tr> <td>
                    <input class="submit-button" type="submit" name="submit" value="Add New DONOR">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    

<?php include('partials/footer.php') ?>