<!DOCTYPE html>
<html>
<head>
<link rel="SHORTCUT ICON" href="images/ahq.png">
<?php
$page = $_GET['page'];
if($page==NULL){ $page="home"; }
include("functions.php"); 
$siteinfo = getSiteData();
$pagedisplay = getPageData($page);
?>
  <?php
    include("add_fancybox.php"); echo "\n";
    //include("meta.php"); echo "<br>";
    include("add_css.php"); echo "\n";
    include("add_js.php"); echo "<br>";
    include("add_fonts.php");
  ?>
<title>
<?php 
echo $siteinfo['name']; 
if($page!="home") { echo " - ".$pagedisplay; }
?>
</title>
</head>
<body>
<?php include_once "analyticstracking.php"; ?>
<div id="main-frame">

  <?php
  include("header.php");
  include("body.php");
  ?>
</div>
<div id="footer-frame">
<?php include("footer.php"); ?>
</div>
</body>
</html>