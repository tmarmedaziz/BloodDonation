<?php include('partials/menu.php') ?>
<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<link rel="stylesheet" href="../style.css" rel="stylesheet">
<?php
    $id_admin=$_SESSION['id'];
    $today_date=date("Y-m-d");
    $verifbook="SELECT * FROM appointement WHERE id_admin='$id_admin' AND date_app>='$today_date'  ORDER BY date_app ASC,time_slot";
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
        <th>date</th>
        <th>infos</th>
    </tr>
            <?php
            $contenue="";
            $date='0000-00-00';
            while($rows=mysqli_fetch_assoc($res)){
                $ts=$rows['time_slot'];
                $id_appoint=$rows['id'];
                $id_donor=$rows['id_donor'];
                $d=$rows['date_app'];
                $res1=mysqli_query($connect ,"SELECT full_name FROM blood_donor WHERE id_donor='$id_donor'");              
                $row1=mysqli_fetch_assoc($res1);
                $donorfn=$row1['full_name'];
                if($date!=$rows['date_app']){
                    $contenue.="</td>
                                </tr>
                                <tr>
                                    <td>$d </td>
                                    <td><li>$donorfn $ts &nbsp <a class='btn-delete-admin' href='appoint/delete.php?id=$id_appoint&idd=$id_donor' >delete</a> </li>";
                    
                }
                else{
                    $contenue.="<li>$donorfn $ts &nbsp <a class='btn-delete-admin' href='appoint/delete.php?id=$id_appoint&idd=$id_donor' >delete</a></li>";
                }
                $date=$rows['date_app'];

            //array_push($bookings,$rows['time_slot']);
        }
        echo $contenue;
        echo "</td></tr></table>";
            
        }
        else{ echo"<h3>There is no appointement </h3>"; }
    }

?>
        </div>
</div>





<?php include('partials/footer.php') ?>