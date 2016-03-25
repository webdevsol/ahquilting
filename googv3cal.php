<?php
 
/* Base code provided by Sarah Bailey.
Case Western Reserve University, Cleveland OH.
Please do not email me for support. Post a comment instead.
Current v 1.1
Props to commenter Matt for pointing out the maxResults parameter.
*/
 
//TO DEBUG UNCOMMENT THESE LINES
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
 
//INCLUDE THE GOOGLE API PHP CLIENT LIBRARY FOUND HERE
//https://github.com/google/google-api-php-client
//DOWNLOAD IT AND PUT IT ON YOUR WEBSERVER IN THE ROOT FOLDER.
//include(__DIR__.'/google-api-php-client-master/src/Google/autoload.php'); 
 include('../google-api-php-client-master/autoload.php');


 
//TELL GOOGLE WHAT WE'RE DOING
$client = new Google_Client();
$client->setApplicationName("My Project"); //DON'T THINK THIS MATTERS
$client->setDeveloperKey('AIzaSyA58CqtEhRYEjHN5hTv5j5Uv-O0-W4ph08'); //GET AT DEVELOPERS.GOOGLE.COM
$cal = new Google_Service_Calendar($client);
//THE CALENDAR ID, FOUND IN CALENDAR SETTINGS. IF YOUR CALENDAR IS THROUGH GOOGLE APPS
//YOU MAY NEED TO CHANGE THE CENTRAL SHARING SETTINGS. THE CALENDAR FOR THIS SCRIPT
//MUST HAVE ALL EVENTS VIEWABLE IN SHARING SETTINGS.
$calendarId = 'annholtequilting@gmail.com'; // ann holte quilting

//TELL GOOGLE HOW WE WANT THE EVENTS
$params = array(
//CAN'T USE TIME MIN WITHOUT SINGLEEVENTS TURNED ON,
//IT SAYS TO TREAT RECURRING EVENTS AS SINGLE EVENTS
    'singleEvents' => true,
    'orderBy' => 'startTime',
    'timeMin' => date(DateTime::ATOM),//ONLY PULL EVENTS STARTING TODAY
    'maxResults' => 15 //ONLY USE THIS IF YOU WANT TO LIMIT THE NUMBER
                  //OF EVENTS DISPLAYED	
);

//THIS IS WHERE WE ACTUALLY PUT THE RESULTS INTO A VAR
$events = $cal->events->listEvents($calendarId, $params); 
$calTimeZone = $events->timeZone; //GET THE TZ OF THE CALENDAR

//SET THE DEFAULT TIMEZONE SO PHP DOESN'T COMPLAIN. SET TO YOUR LOCAL TIME ZONE.
 date_default_timezone_set($calTimeZone);
 ?>        
    <div style="text-align:center; font-weight:bold; font-size:28px; font-family:'Stint Ultra Condensed';">Upcoming Events</div>
    <div style="z-index:101; overflow:auto; position:relative; height:300px;">
<ul id="cal-list">
 <?php
 //START THE LOOP TO LIST EVENTS
    $style=3;
    foreach ($events->getItems() as $event) {
		$title = $event->summary;
    $title = str_replace("’","'",$title);
		$desc = $event->description;
    $desc = str_replace("’","'",$desc);   
    $desc = str_replace("â€™","'",$desc);
		$where = $event->location;
		
 
        //Convert date to month and day
 
         $start_tmp = $event->start->dateTime;
         if(empty($start_tmp)) { $start_tmp = $event->start->date; }
		 $end_tmp = $event->end->dateTime; 
         if(empty($end_tmp)) { $end_tmp = $event->end->date; }
 
         $temp_timezone = $event->start->timeZone;
 //THIS OVERRIDES THE CALENDAR TIMEZONE IF THE EVENT HAS A SPECIAL TZ
         if (!empty($temp_timezone)) {
         $timezone = new DateTimeZone($temp_timezone); //GET THE TIME ZONE
                 //Set your default timezone in case your events don't have one
         } 
		 else { $timezone = new DateTimeZone($calTimeZone); }
 
 		 $link = $event->htmlLink;
                 $TZlink = $link . "&ctz=" . $calTimeZone; //ADD TZ TO EVENT LINK
				 							//PREVENTS GOOGLE FROM DISPLAYING EVERYTHING IN GMT
											
         $start = new DateTime($start_tmp,$timezone);
		 $end = new DateTime($end_tmp,$timezone);
		 $end_txt = new DateTime($end_tmp,$timezone);
         $end_txt->sub(new DateInterval('PT30S'));
		 
		 $month = $start->format("M");
         $dayText = $start->format("l");
         $date = $start->format("j");  
           
         $month_end = $end->format("M");
         $dayText_end = $end_txt->format("l");
         $date_end = $end_txt->format("j");
            
         $startTime = $start->format("g:i a");
         $endTime = $end->format("g:i a");
        ?>

          <li class="event<?php if(is_today($start)) { echo " today"; } ?>">
            <table valign="top" style="border-collapse:collapse;">
              <tr>
                <td rowspan="2" class="cal-date">
                <?php if($style==1) { ?>
                  <div class="cal-pg"><hr><?php echo $date; ?></div>
                <?php } elseif($style==2 || $style==3) { ?>
                  <div class="cal-pg" <?php if($date != $date_end) { echo "style=\"height:62px;\""; }?>>
                    <table>
                      <tr>
                        <td class="cal-pg-mo">
                        <?php 
                          echo strtoupper($month);
                          if($month != $month_end){
                            echo "-".strtoupper($month_end);
                          } 
                        ?>
                        <hr<?php if($date != $date_end){ echo " style=\"width:100%\""; }?>></td>
                        <td class="cal-pg-date">
                          <?php 
                            echo $date; 
                            if($date != $date_end) {
                              echo "<br>";
                              echo $date_end;
                            }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                <?php } ?>
                </td>
                <td class="cal-title"><a href="<?php echo $link; ?>" target="_new"><?php echo $title; ?></a></td>          
              </tr>
              <tr>
                <td class="cal-desc">
                <?php echo trim($dayText); 
                  if($startTime == $endTime && $date == $date_end) { 
                    echo ", All Day Event"; 
                  } else { 
                    if($date !=  $date_end){
                      if($startTime == $endTime){
                        echo " - " . $dayText_end;
                      } else {     
                        echo ", ".$startTime." - ".$dayText_end.", ".$endTime;
                      } 
                    } else {   
                      echo ", ".$startTime." - ".$endTime;
                    }
                  } 
                ?>
                <?php if($where!="") echo " &raquo;<br>Location: ".$where; 
                      if($desc!="") echo "<br><br>".$desc; ?>
                </td>
              </tr>
            </table>
          </li>          
          <li class="cal-list-li-hr"><hr class="cal-list-hr"></li>
 <?php } ?>
 </ul>        
    </div>
    <div style="z-index:101; position:absolute; bottom:10px; width:90%; text-align:center; font-family:'Stint Ultra Condensed'; font-size:20px;"><a href="?page=calendar" style="text-decoration:none; color:#000000;">Click for Full  Calendar</a></div>
 <?php 
function is_today($date){
   $today = new DateTime();
   $chk_today = $today->format("Y-m-d");
   $chk_date = $date->format("Y-m-d");
   
   if($chk_today==$chk_date)
	return true;
   else 
	return false;
}
?>