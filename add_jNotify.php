<?php
$status = $_GET['status'];
if($status == "success"){ 
?>
<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    // jNotify();
    // jError();
      jSuccess(
    	'Teaching successfully uploaded!',
		{
		  autoHide : true, // added in v2.0
		  clickOverlay : false, // added in v2.0
		  MinWidth : 250,
		  TimeShown : 2000,
		  ShowTimeEffect : 1000,
		  HideTimeEffect : 1000,
		  LongTrip :20,
		  HorizontalPosition : 'center',
		  VerticalPosition : 'top',
		  ShowOverlay : false,
   		  ColorOverlay : '#000',
		  OpacityOverlay : 0.0,
		  onClosed : function(){ // added in v2.0
		   
		  },
		  onCompleted : function(){ // added in v2.0
		   
		  }
		});
    });
</script>    
<?php } else if($status == "fel_suc_new"){ ?>
<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    // jNotify();
    // jError();
      jSuccess(
    	'New fellowship successfully added!',
		{
		  autoHide : true, // added in v2.0
		  clickOverlay : false, // added in v2.0
		  MinWidth : 250,
		  TimeShown : 2000,
		  ShowTimeEffect : 1000,
		  HideTimeEffect : 1000,
		  LongTrip :20,
		  HorizontalPosition : 'center',
		  VerticalPosition : 'top',
		  ShowOverlay : false,
   		  ColorOverlay : '#000',
		  OpacityOverlay : 0.0,
		  onClosed : function(){ // added in v2.0
		   
		  },
		  onCompleted : function(){ // added in v2.0
		   
		  }
		});
    });
</script>    
<?php } ?>