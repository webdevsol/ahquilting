<!-- menu divs -->
  <script>
    $(document).ready(function() 
    {
        var tab = getUrlVars()["tab"];
        pptoggle(tab);
    }); 
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }
  </script>
  
<script>

  function pptoggle( id ) {        
    id = (id) ? id : 'products';
    updateTabCss(id+"-tab");
    hideDivs();
    document.getElementById(id).style.display = 'block';  
  }  
  function hideDivs(){
    document.getElementById('products').style.display = 'none'; 
    //document.getElementById('quotes').style.display = 'none'; 
    //document.getElementById('blog').style.display = 'none'; 
  }
</script>
 
<!-- menu tabs -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
  tab = jQuery.noConflict(true);
  tab(function() {
    tab("li#menu").click(function(e) {
      e.preventDefault();
      tab("li#menu").removeClass("selected");
	  tab(this).addClass("selected");
	});
  });
</script>   
<script>
  function updateTabCss(id){
    $(".menu").removeClass("selected");
    $("#"+id).addClass("selected");
  }
</script>