<link rel="stylesheet" href="new-admin.css" rel="stylesheet">
<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<?php include('partials/menu.php') ?>
<div class="contenent">
    <div class="wrapper">
        <a href="add_new_donor.php" class="btn-add-admin">Add New Donor</a> &nbsp &nbsp &nbsp
        <a href="alldonors.php" class="btn-add-admin">View All Donors</a>
        <br >
        <br >
        <form method="POST">
    <input type="radio" id="html" name="filter" value="0" checked >
  <label for="html">Cin</label>
  <input type="radio" id="css" name="filter" value="1">
  <label for="css">Full name</label>
  <input type="radio" id="javascript" name="filter" value="6">
  <label for="javascript">Phone number</label><br />
<button type="submit" class="btn-add-admin">Change Filter</button>
</form>
<?php
    if (isset($_POST['filter'])) {
    $list=$_POST['filter'];}
    else {
        $list=0;
    }
 ?>
         <br />
         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <?php 
            if (isset($_SESSION['update'])) {
                echo  $_SESSION['update'];
                unset($_SESSION['update']);
           } ?>
        <br />
        
<table id="myTable" class="tbl-full">
    <tr>
        <th>CIN</th>
        <th>Full Name</th>
        <th>Blood sample</th>
        <th>Blood Type</th>
        <th>Sex</th>
        <th>Date of Birth</th>
        <th>Phone</th>
        <th>Mail Address</th>
        <th>City</th>

        <th>Actions</th>
    </tr>
    <?php
      //  $filter="WHERE id_admin=1";
        $filter="WHERE id_admin=".strval($_SESSION['id']);
        $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
        $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
        $res=mysqli_query($connect ,"SELECT * FROM blood_donor ".$filter." ORDER BY blood_sample DESC");
        if ($res==TRUE) {
            $nb_rows=mysqli_num_rows($res);
            if ($nb_rows>0) {
                while ($rows=mysqli_fetch_assoc($res)) {
                    $id_donor=$rows['id_donor'];
                    $full_name=$rows['full_name'];
                    $last_blood_sample=$rows['last_blood_sample'];
                    $blood_sample=$rows['blood_sample'];
                    $blood_type=$rows['blood_type'];
                    $sexe=$rows['sexe'];
                    $date_of_birth=$rows['date_of_birth'];
                    $phone_number=$rows['phone_number'];
                    $email=$rows['email'];
                    $city=$rows['city'];
                    ?>
    <tr>
        <td><?php echo $id_donor ; ?></td>
        <td><?php echo $full_name ; ?></td>
        <td><?php echo $blood_sample ; ?></td>
        <td><?php echo $blood_type ; ?></td>
        <td><?php echo $sexe ; ?></td>
        <td><?php echo $date_of_birth ; ?></td>
        <td><?php echo $phone_number ; ?></td>
        <td><?php echo $email ; ?></td>
        <td><?php echo $city ; ?></td>
        <td><a href="update_donor.php?id=<?php echo $id_donor; ?>" class="btn-update-admin">Update</a><br ><br > <a href="appointement.php?id=<?php echo $id_donor; ?>" class="btn-delete-admin">Appointment</a></td>
    </tr>
                    <?php
                }
            }
        }
     ?>
    
</table>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[<?php echo $list;?>];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</div>
</div>


<?php include('partials/footer.php') ?>