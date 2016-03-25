<script>
$(document).ready(function(){
    $("#slideshow > div:gt(0)").hide();
    
    setInterval(function() { 
      $('#slideshow > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('#slideshow');
    },  10000);
});
</script>

<style>
#slideshow > div{
    position: absolute;
}
</style>

<?php 
/*if($_GET['temp']==1) {
include('olympics.php');
} else { 
include('book_promo.php'); 
}*/
?>
     
<div id="slideshow">
   <div>
      <?php include('book_promo.php'); ?>
   </div>
   <!--div>
     <?php //include('olympics.php'); ?>
   </div-->
   <div>
	 <?php include('flip_book.php'); ?>
   </div>
</div>