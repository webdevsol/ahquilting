<?php 
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$addr1 = $_GET['addr1'];
$addr2 = $_GET['addr2'];
$city = $_GET['city'];
$state = $_GET['state'];
$zip = $_GET['zip'];
$phone = $_GET['phone'];
$em = $_GET['em'];
$specs = $_GET['specs'];
include "../states.php";
?>

<form id="contact_form" method="POST" action="email_contact_form.php">
<table>
  <tr>
    <td class="contact_label">Name <span>*</span></td>
    <td class="contact_input">
      <input type="text" id="fname" name="fname" placeholder="First Name" <?php if($fname!=''){ echo 'value="'.$fname.'"'; } ?>>&nbsp;
      <input type="text" id="lname" name="lname" placeholder="Last Name" <?php if($lname!=''){ echo 'value="'.$lname.'"'; } ?>>
    </td>
  </tr>
  <tr>
    <td class="contact_label">Address</td>
    <td class="contact_input">
      <input type="text" id="addr1" name="addr1" placeholder="123 North Main Street" <?php if($addr1!=''){ echo 'value="'.$addr1.'"'; } ?>><br>
      <input type="text" id="addr2" name="addr2" <?php if($addr2!=''){ echo 'value='.$addr2.''; } ?>>
    </td>
  </tr>

  <tr>
    <td class="contact_label">City</td>
    <td class="contact_input">
      <input type="text" id="city" name="city" placeholder="Anytown" <?php if($city!=''){ echo 'value="'.$city.'"'; } ?>>
    </td>
  </tr>
  <tr>
    <td class="contact_label">State, ZIP</td>
    <td class="contact_input">            
      <select name="state" id="state"> 
        <option value="NA" <?php if($state==''){ ?>selected<?php } ?> disabled>--</option> 
		<?php foreach($states as $st) { ?>
        <option value="<?php echo $st; ?>" <?php if($state==$st){ ?>selected<?php } ?>><?php echo $st; ?></option>  
		<?php } ?>
      </select>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" id="zip" name="zip" placeholder="12345" <?php if($zip!=''){ echo 'value="'.$zip.'"'; } ?>>
    </td>
  </tr>
  <tr>
    <td class="contact_label">Phone Number <span>*</span></td>
    <td class="contact_input"><input type="text" id="phone" name="phone" placeholder="4845559812" <?php if($phone!=''){ echo 'value="'.$phone.'"'; } ?>></td>
  </tr>
              
  <tr>
    <td class="contact_label">eMail Address <span>*</span></td>
    <td class="contact_input"><input type="text" id="em" name="em" placeholder="john.doe@anysite.com" <?php if($em!=''){ echo 'value="'.$em.'"'; } ?>></td>
  </tr>
  <tr>
    <td class="contact_label">Question <span>*</span></td>
    <td class="contact_input">
      <textarea id="specs" name="specs" height rows="6" <?php if($specs!=''){ echo 'value="'.$specs.'"'; } ?>>Please type your question for Ann here.</textarea>
    </td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" id="submit" name="submit" value="Send Email"></td>
  </tr>
</table>
  