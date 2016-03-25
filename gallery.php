<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>

  <link href='http://fonts.googleapis.com/css?family=Snippet|Arvo:400,700,400italic,700italic|Grand+Hotel|Expletus+Sans:400,400italic,500,500italic,600,600italic,700,700italic|Trochut:400,700,400italic|Jacques+Francois+Shadow|Roboto+Slab:400,700,100,300|Merriweather:400,900,300,300italic,900italic,700italic,700,400italic|Playfair+Display+SC:400,700,400italic,700italic,900,900italic|Julius+Sans+One|Rosario:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <LINK REL=StyleSheet HREF="css/patch.css" TYPE="text/css" MEDIA=screen>
  <LINK REL=StyleSheet HREF="css/gallery.css" TYPE="text/css" MEDIA=screen>

  </head>
  <body>
  
  <div id="gallery" class="page-curl">
    <div class="container">
      <ul class="thumb">
      
<?php 
  $con = connect_ahq();
  $gal_qry = "SELECT * FROM gallery ORDER BY dispor";
  $gal_rslt = mysql_query($gal_qry);
  
  for($i = 0; $i < mysql_num_rows($gal_rslt); $i++ ){
    $image = mysql_result($gal_rslt,$i,'image');
    $thumb = mysql_result($gal_rslt,$i,'thumb');
    $title = mysql_result($gal_rslt,$i,'title');
    $quilter = mysql_result($gal_rslt,$i,'quilter'); 
?>
          <li>
            <a href="http://www.annholtequilting.com/cust-img/<?php echo $image; ?>" class="fancybox" data-fancybox-group="gallery" title="<?php echo $title; ?>">
              <img src="http://www.annholtequilting.com/cust-img/<?php echo $thumb; ?>" border="0">
              <?php if($quilter != ""){ ?>
              <span class="text-content">
                <span>by <?php echo $quilter; ?></span>
              </span>
              <?php } ?>
            </a>
          </li>
<?php } mysql_close($con); ?>

      </ul>
    </div>    
     
    <div class="thread1" id="gallery-thread"></div>
    <div class="thread2" id="gallery-thread2"></div>
   
  </div>
   
  </body>
</html>