<?php include('partials/menu.php') ?>
<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<link rel="stylesheet" href="../style.css" rel="stylesheet">

        <?php
        $id_admin=$_SESSION['id'];
        $today_date=date("Y-m-d");
        $verifbook="SELECT * FROM requests WHERE state_request=0 ";
        $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
        $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
        $bookings=array();
        $res=mysqli_query($connect ,$verifbook);
        
            if ($res==TRUE) {
                $nb_rows=mysqli_num_rows($res);
                if ($nb_rows> 0) { ?>
                <div class="contenent">
                <div class="wrapper">
                <table class="tbl-full-sh">
                    <tr>
                        <th>full name</th>
                        <th>email</th>
                        <th>phone number</th>
                        <th>donated</th>
                        <th>city</th>
                        <th>date from</th>
                        <th>date to</th>
                    </tr>

                    <?php
                    $contenue="";
                    $date='0000-00-00';
                    while($rows=mysqli_fetch_assoc($res)){
                        $fn=$rows['full_name'];
                        $email=$rows['email'];
                        $donated=$rows['donated'];
                        $phone_number=$rows['phone_number'];
                        $city=$rows['city'];
                        $d_f=$rows['date_from'];
                        $d_t=$rows['date_to'];
                        // $res1=mysqli_query($connect ,"SELECT full_name FROM blood_donor WHERE id_donor='$id_donor'");              
                        // $row1=mysqli_fetch_assoc($res1);
                        // $donorfn=$row1['full_name'];
                        // if($date!=$rows['date_app']){
                            $contenue.="</td>
                                        </tr>
                                        <tr>
                                            <td>$fn </td>
                                            <td>$email </td>
                                            <td>$phone_number</td>
                                            <td>$donated";
                                            if ($donated=='no') {
                                                
                                                $contenue.="&nbsp <a class='btn-add-admin' href='add_new_donor.php?fn=$fn&email=$email&phone_number=$phone_number&city=$city'>Add</a>";
                                            }
                                            $contenue.="</td>
                                            <td>$city </td>
                                            <td>$d_f </td>
                                            <td>$d_t";
                            
                        // }
                        // else{
                        //     $contenue.="<li>$donorfn $ts &nbsp <a class='btn-delete-admin' href='appoint/delete.php?id=$id_appoint&idd=$id_donor' >delete</a></li>";
                        // }
                        // $date=$rows['date_app'];

                    //array_push($bookings,$rows['time_slot']); -->
                        }
                        echo $contenue;
                        echo "</td></tr></table>";
                    
                    }
                else{ echo"<h3>               There is no appointement requests </h3>"; }
            }

    ?>
        </div>
</div>





<?php include('partials/footer.php') ?>