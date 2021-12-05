<link rel="stylesheet" href="new-admin.css" rel="stylesheet">
<link rel="stylesheet" href="admin_style.css" rel="stylesheet">
<?php include('partials/menu.php') ?>
<?php 
$duration = 15;
$cleanup = 0;
$start = "08:30";
$end = "15:00";
function timeslots($duration, $cleanup, $start, $end){
  $start = new DateTime($start);
  $end = new DateTime($end);
  $interval = new DateInterval("PT".$duration."M");
  $cleanupInterval = new DateInterval("PT".$cleanup."M");
  $slots = array();
  
  for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
      $endPeriod = clone $intStart;
      $endPeriod->add($interval);
      if($endPeriod>$end){
          break;
      }
      
      $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
      
  }
  
  return $slots;
}

    $id=$_GET['id'];
    $date=$_GET['date'];
    $id_admin=$_SESSION['id'];


    $verifbook="SELECT * FROM appointement WHERE date_app='$date' AND id_admin='$id_admin'";
        $connect=mysqli_connect('localhost','root','') or die("Error connceting to DataBase");
        $db_select=mysqli_select_db($connect,"site-test") or die(mysqli_error());
        $bookings=array();
        $res=mysqli_query($connect ,$verifbook);
            if ($res==TRUE) {
            $nb_rows=mysqli_num_rows($res);
            if ($nb_rows> 0) {
                while($rows=mysqli_fetch_assoc($res)){
                array_push($bookings,$rows['time_slot']);}
                
            }
        }

    ?>
                <div class="row"><p>&nbsp &nbsp &nbsp &nbsp &nbsp Booking for :
              <?php  echo $date; ?></p>
                </div>
       
<div class="row">
  
       <centre><?php echo(isset($msg))?$msg:""; ?></centre>
   
    <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
        foreach($timeslots as $ts){
    ?>
    <div class="col-md-2">
        <div class="form-group">
          <?php
        if(in_array($ts,$bookings)){ ?>
          <a class="btn-n-a" ><?php echo $ts; ?></a>
        <?php }
          else{ ?>
           <a class="btn-book" href="appointement2.php?time=<?php echo $ts; ?>&date=<?php echo $date; ?>&id=<?php echo $id; ?>" <?php echo $ts; ?>"><?php echo $ts; ?></a>
          <?php } ?>

        </div>
    </div>
    <?php } ?>
</div>
<?php include('partials/footer.php') ?>