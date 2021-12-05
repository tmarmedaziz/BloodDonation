<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<?php include('partials/menu.php') ?>
<?php if (isset($_SESSION['username'])) {
                    if($_SESSION['username']=="admin"){ ?>
<div class="contenent">
    <div class="wrapper">
        <h2>Manage Admins</h2>
        <a href="new-account-admin.php" class="btn-add-admin">add new admin</a>
        <br ><br >
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
    $filter=$_POST['filter'];}
    else {
        $filter=0;
    }
 ?>
         <br />
         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

         <br />
         <br />
        <?php 
            if (isset($_SESSION['add'])) {
                echo  $_SESSION['add'];
                unset($_SESSION['add']);
           }
           if (isset($_SESSION['del'])) {
            echo  $_SESSION['del'];
            unset($_SESSION['del']);
           }
           if (isset($_SESSION['update'])) {
            echo  $_SESSION['update'];
            unset($_SESSION['update']);
           }
           if (isset($_SESSION['admin_connect'])) {
            echo  $_SESSION['admin_connect'];
            unset($_SESSION['admin_connect']);
           }
         ?>
        
<table id="myTable" class="tbl-full">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Mail Address</th>
        <th>Phone</th>
        <th>Sex</th>
        <th>Date of Birth</th>
        <th>Actions</th>
    </tr>
    <?php
        $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
        $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
        $res=mysqli_query($connect ,"SELECT * FROM tbl_admin ");
        if ($res==TRUE) {
            $nb_rows=mysqli_num_rows($res);
            if ($nb_rows>0) {
                while ($rows=mysqli_fetch_assoc($res)) {
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];
                    $email=$rows['email'];
                    $phone_number=$rows['phone_number'];
                    $sexe=$rows['sexe'];
                    $date_of_birth=$rows['date_of_birth'];
                    ?>
    <tr>
        <td><?php echo $id ; ?></td>
        <td><?php echo $full_name ; ?></td>
        <td><?php echo $username ; ?></td>
        <td><?php echo $email ; ?></td>
        <td><?php echo $phone_number ; ?></td>
        <td><?php echo $sexe ; ?></td>
        <td><?php echo $date_of_birth ; ?></td>
        <td><a href="update_admin.php?id=<?php echo $id; ?>" class="btn-update-admin">Update</a> <a href="delete_admin.php?id=<?php echo $id; ?>" class="btn-delete-admin">Delete</a></td>
    </tr>
                    <?php
                }
            }
        }
      }
    else{echo "you are not allowed to enter here";}}
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
    td = tr[i].getElementsByTagName("td")[<?php echo $filter;?>];
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