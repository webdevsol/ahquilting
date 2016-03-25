
    <?php   
    putenv("TZ=America/New_York");
    $style=3;
    include_once('../coreylib/coreylib.php');                       
    $userid = 'annholtequilting%40gmail.com';
    $magicCookie = 'cookie';
    $futureevents = "true";
    $orderby = "starttime";
    $sortorder = "ascend";
    $singleevents = "true";                      
    $maxresults = "15";
    $upcoming = $_GET['upcoming'];
    $upcoming = "true";
                              
    $todayYear = date("Y");
    $todayMonth = date("m"); 
    $todayMonthText = date("F");
    $todayDay = date("d");
    $todayMaxDay = date("t");
    
    $startmin = "$todayYear-$todayMonth-$todayDay"."T03:00:00";   
    $calYear = $todayYear;
    $calMonth = $todayMonth;
    $calMonthText= $todayMonthText;
    $calMaxDay = $todayMaxDay;
    $calDay = $todayDay;
    
    if($calMonth==1){
      $lastDate = date("Y-m-d",strtotime(($calYear-1)."-12-01"));
    } else {
      $lastDate = date("Y-m-d",strtotime($calYear."-".($calMonth-1)."-01"));
    }
    if($calMonth==12){
      $nextDate = date("Y-m-d",strtotime(($calYear+1)."-01-01"));
    } else {
      $nextDate = date("Y-m-d",strtotime($calYear."-".($calMonth+1)."-01"));        
    }
                 
    $startmax = $nextDate."T02:00:00";
    
    // build feed URL
    $feedURL = "http://www.google.com/calendar/feeds/$userid/public/basic";
    $feedURL = $feedURL."?futureevents=true&orderby=$orderby&sortorder=$sortorder&singleevents=$singleevents&max-results=$maxresults";
    $feedURL = "http://annholtequilting.com/ahq_cal.xml";
                             
    ?>  
    <div style="text-align:center; font-weight:bold; font-size:28px; font-family:'Stint Ultra Condensed';">Upcoming Events</div>
    <div style="z-index:101; overflow:auto; position:relative; height:300px;">
    <ul id="cal-list">
      <li class="cal-list-li-hr"><hr class="cal-list-hr"></li>
      <?php if ($feed = coreylib($feedURL)) { ?>
        <?php foreach($feed->get('entry') as $entry) { 
            $i++;
            $title = $entry->get('title');
            $link = $entry->get('link@href'). "&ctz=America/New_York";
            //$st = $entry->get('when@startTime');
            //$ed = $entry->get('when@endTime');
            $cont = $entry->get('content');
            //$where = $entry->get('where@valueString');
            $data = explode("<br />",$cont);
                                         
            $when = str_replace("When: ","",$data[0]);
            $time = explode(" to ",$when);
            $where = str_replace("Where: ","",$data[2]);
            $desc = str_replace("Event Description: ","",$data[4]);
            $desc = str_replace("â€™","'",$desc);
            $end_length = strlen($time[1]);
            
            if($time[1]==""){
              $end_temp = $time[0];      
            } else if($end_length < 14){  
              $pos = strripos($time[0],' ');
              $start_date = substr($time[0],0,$pos);
              $end_time = substr($time[1],0,strlen($time[1])-6);
              $end_temp = $start_date." ".$end_time; 
              //echo $start_date."<br>".$end_time;
            } else  {
              if(substr($time[1],strripos($time[1],' '),3)=="EST"){
                $end_temp = substr($time[1],0,strlen($time[1])-6);
              } else {
                $end_temp = substr($time[1],0,strpos($time[1],"Â"));
              }
            }       
            $start = strtotime($time[0]);
            $end = strtotime($end_temp);
            
            $month = date("M",$start);
            $dayText = date("l",$start);
            $date = date("j",$start);   
            
            $month_end = date("M",$end);
            $dayText_end = date("l",$end-60);
            $date_end = date("j",$end-60);
            
            // NEED TO FIGURE OUT WHY ctz DOESN'T WORK
            if(date('I', time())){
              // Daylight Savings Time
              $startTime = date("g:i a",$start);
              $endTime = date("g:i a",$end);
            } else {
              // Standard Time
              $startTime = date("g:i a",$start);//,$start-(60*60));
              $endTime = date("g:i a",$end);//,$end-(60*60));
            }
        ?>
          <li class="event<?php if(date("Y-m-d")==date("Y-m-d",strtotime($start))) { echo " today"; } ?>">
            <table valign="top" style="border-collapse:collapse;">
              <tr>
                <td rowspan="2" class="cal-date">
                <?php if($style==1) { ?>
                  <div class="cal-pg"><hr><?php echo $date; ?></div>
                <?php } elseif($style==2 || $style==3) { ?>
                  <div class="cal-pg">
                    <table>
                      <tr>
                        <td class="cal-pg-mo"><?php echo strtoupper($month); ?><hr></td>
                        <td class="cal-pg-date"><?php echo $date; ?></td>
                      </tr>
                    </table>
                  </div>
                <?php } ?>
                </td>
                <td class="cal-title"><a href="<?php echo $link; ?>" target="_new"><?php echo $title; ?></a></td>          
              </tr>
              <tr>
                <td class="cal-desc">
                <?php echo "$dayText, "; ?>
                <?php if($startTime==$endTime) { echo "All Day Event"; } else { echo $startTime." - ".$endTime; } ?>
                <?php if($desc!="") echo " &raquo; ".$desc; ?>
                </td>
              </tr>
            </table>
          </li>          
          <li class="cal-list-li-hr"><hr class="cal-list-hr"></li>
        <?php } ?>
      <?php } ?>
    </ul>
    </div>
    <div style="z-index:101; position:absolute; bottom:10px; width:90%; text-align:center; font-family:'Stint Ultra Condensed'; font-size:20px;"><a href="?page=calendar" style="text-decoration:none; color:#000000;">Click for Full  Calendar</a></div>