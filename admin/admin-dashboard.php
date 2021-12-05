<?php include('partials/menu.php') ?>
<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<link rel="stylesheet" href="../style.css" rel="stylesheet">
<div class="contenent">
        <div class="wrapper">
        <h1>DASHBOARD</h1>
        
        <?php 
            if (isset($_SESSION['add'])) {
                echo  $_SESSION['add'];
                unset($_SESSION['add']);
           } 
            if (isset($_SESSION['username'])) {
                    if($_SESSION['username']=="admin"){
                    echo "<a href='admin-list.php' class='btn-add-admin'>Admins List</a>" ;}
                } 
                ?>
        <br >
            <div class="box text-align-center">
                <h2><a class="btn-add-admin" href="view_donors.php">View Donors</a></h1>
                    <p><br/> View, update and set appointments for your donors</p>
            </div>
            <div class="box text-align-center">
                <h2><a class="btn-add-admin" href="add_new_donor.php">New Donor</a></h1>
                <br/>Add new donors for your list
            </div>
            <div class="box text-align-center">
                <h2><a class="btn-add-admin" href="schedule.php">Schedule</a></h1>
                <br/>View your upcoming appointments
            </div>
            <div class="box text-align-center">
                <h2><a class="btn-add-admin" href="change_password.php">password</a></h1>
                <br/> change your password 
            </div>
            <div class="clearfix"></div>
        
        
        
        </div>
</div>





<?php include('partials/footer.php') ?>