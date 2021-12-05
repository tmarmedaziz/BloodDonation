<link rel="stylesheet" href="../new-admin.css" rel="stylesheet">
<link rel="stylesheet" href="../admin_style.css" rel="stylesheet">
  <?php
   function build_calendar($month,$year){
        $daysofweek=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        $firstdayofmonth=mktime(0,0,0,$month,1,$year);
        $numberdays=date('t',$firstdayofmonth);
        $datecomponents=getdate($firstdayofmonth);
        $monthname=$datecomponents['month'];
        $dayofweek=$datecomponents['wday'];
        $datetoday=date('Y-m-d');
        $suff=$_SERVER['REQUEST_URI'];
        $calendar="<table class='table table-bordered'>";
        $calendar.="<center><h2>$monthname $year</h2></center>";
        $calendar.= "<a class='btn-add-admin' href='$suff?&month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
        $calendar.= " <a href='appointement.php' class='btn-add-admin' data-month='".date('m')."' data-year='".date('Y')."'>Current Month</a> ";

    $calendar.= "<a href='$suff?&month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."' class='btn-add-admin'>Next Month</a></center><br>";

        $calendar.="<tr>";
        foreach($daysofweek as $day){
            $calendar.="<th class='header'>$day</th>";
        }
        $calendar.="</tr><tr>";

        if ($dayofweek > 0) {
            for ($k=0; $k < $dayofweek; $k++) { 
                $calendar.="<td></td>";
            }
        }
        $currentday=1;
        $month=str_pad($month,2,"0",STR_PAD_LEFT);
        while ($currentday <= $numberdays) {
            if ($dayofweek == 7) {
                $dayofweek=0;
                $calendar.="</tr><tr>";
            }
            $currentdayrel=str_pad($currentday,2,"0",STR_PAD_LEFT);
            $date="$year-$month-$currentdayrel";

            $today= $date==date('Y-m-d')?"today":"";
            if($date<date('Y-m-d')){
                $calendar.="<td><h4>$currentday</h4><a class='btn-n-a'>N/A</a>";
            }
            else{$calendar.="<td class='$today'><h4>$currentday</h4><a class='btn-book' href='admin-list.php?date=$date'>Book</a>";
            }
            

            
            $calendar.="</td>";
            $currentday++;
            $dayofweek++;
        }
        if($dayofweek != 7){
            $remainingdays=7-$dayofweek;
            for ($i=0; $i < $remainingdays; $i++) { 
                $calendar.="<td></td>";
            }
        }
        $calendar.="</tr>";
        $calendar.="</table>";
        echo $calendar;
   }
    
  ?>
  <html>
      <?php
        $datecomponents=getdate();
        if(isset($_GET['month']) && isset($_GET['year'])){
            $month = $_GET['month']; 			     
            $year = $_GET['year'];
             }else{
            $month = $datecomponents['mon']; 			     
            $year = $datecomponents['year'];
            }
        echo build_calendar($month,$year);
      ?>
  </html>