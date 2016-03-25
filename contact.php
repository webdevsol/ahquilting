<?php $status = $_GET['status']; ?>
    
<table class="contact">
  <tr>
    <td><?php if($status=='ty'){ ?>
    
  <p align="center" class="status_good">Thank you for your interest in Ann Holte Quilting!<br>We will get back to you shortly.</p>
<?php } elseif($status=='cont') { ?>
  <p align="center" class="status_bad">Please enter a method of contact so we can respond to your questions.</p>
<?php } elseif($status=='name') { ?>
  <p align="center" class="status_bad">Please enter your first and last name in the form before you submit.</p>
<?php } ?>
                         
    <?php include "contact_header.php" ?>

      <?php include('contact_form.php'); ?>
    </td>
    <td class="info"> 
      <div id="sideNavMenuSelected">
        <table>
          <tr>
            <td class="cont-headshot">
              <img src="http://www.wdsolutionsonline.com/ahquilting/cust-img/ann_holte_portrait.jpg"><br><br>
            </td>
          </tr>
          <tr><td class="name">Ann Parsons Holte</td></tr>
          <tr><td class="cont-info-head">Contact Information</td></tr>
          <tr>
            <td class="cont-info">
              <!--div class="address">
                2279 Southpoint Dr.     <br>
                Hummelstown, PA 17036      <br>
              </div>
              <div class="phone">717-377-6247</div-->        
              <div class="email"><a href="mailto:ann@annholtequilting.com" target="_new">ann@annholtequilting.com</a></div>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>