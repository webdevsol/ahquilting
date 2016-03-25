<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = preg_replace('/\D/', '', $_POST['phone']);
$email = $_POST['em'];
$specs = $_POST['specs'];

$to = "ann@annholtequilting.com";
$subject = "Contact form from annholtequilting.com";
$message = '
<html>
<head>


</head>
<body>
  <style>
    @import url(http://fonts.googleapis.com/css?family=PT+Sans+Narrow);
    @import url(http://fonts.googleapis.com/css?family=Ubuntu);
    .contact_label { vertical-align:top; font-family:\'Ubuntu\'; font-size:14px; font-weight:bold; width:180px; padding: 5px 0px; } 
    #contact_info { margin:25px 0px; }
  </style>

  <table width="100%">
    <tr>
      <td><img src="http://www.wdsolutionsonline.com/images/logo1.png" width="400"></td>
    </tr>
    <tr>
      <td style="font-size:16px; font-style:italic; color:#5C5C5C; line-height:0.8em">For every web development need &rarr; we have a solution!<br><br></td>
    </tr>
    <tr>
      <td><hr style=" border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3); text-align:left; margin: 0 auto 0 0;"></td>
    </tr>
    <tr>
      <td>
        <table id="contact_info">
          <tr>
            <td colspan="2" class="contact_label" style="font-size:18px; font-style:italic;">Response from contact form:</td>
          </tr>
          <tr>
            <td class="contact_label">Name</td>
            <td>' . $fname . ' ' . $lname . '</td>
          </tr>
          <tr>
            <td class="contact_label">Address</td>
            <td>' . $addr1 . '<br>'; if($addr2 != NULL) { $message = $message . $addr2 . '<br>'; } $message = $message . $city . ', ' . $state . '  ' . $zip . '</td>
          </tr>
          <tr>
            <td class="contact_label">Phone</td>
            <td>'; if($phone!=''){ $message = $message . '(' . substr($phone,0,3) . ') ' . substr($phone,3,3) . '-' . substr($phone,6,4); } $message = $message . '</td>
          </tr>
          <tr>
            <td class="contact_label">eMail</td>
            <td>' . $email . '</td>
          </tr>
          <tr>
            <td class="contact_label">Question</td>
            <td>' . $specs . '</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td><hr style=" border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3); text-align:left; margin: 0 auto 0 0;"></td>
    </tr>
    <tr>
      <td>
        <table>
          <tr>
            <td style="font-weight:bold; font-size:18px; font-style:italic;">Web Development Solutions</td>
            <td></td>
          </tr>
          <tr>
            <td>www.wdsolutionsonline.com</td>  
            <td></td>
          </tr>    
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
';
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/html\r\n"; 

if( ($fname == '') && ($lname == '') ){
  header("location:http://www.annholtequilting.com?page=contact&status=name&fname=$fname&lname=$lname&addr1=$addr1&addr2=$addr2&city=$city&state=$state&zip=$zip&phone=$phone&em=$email&specs=$specs");
} elseif( ($email == '') && ($phone == '') ){
  header("location:http://www.annholtequilting.com?page=contact&status=cont&fname=$fname&lname=$lname&addr1=$addr1&addr2=$addr2&city=$city&state=$state&zip=$zip&phone=$phone&em=$email&specs=$specs");
} else {
  mail($to,$subject,$message,$headers);
  mail('info@wdsolutionsonline.com',$subject,$message,$headers); 
  //mail('zaolithos@gmail.com',$subject,$message,$headers);
  header("location:http://www.annholtequilting.com?page=contact&status=ty");
}
?>

