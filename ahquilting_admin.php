<?php 
  include('../ahquilting/add_jNotify.php'); 
  include('../ahquilting/add_jqtab.php'); 
  include('../ahquilting/add_js.php');
?>
                                                        
<script language="javascript" type="text/javascript">
    
    function validateForm() {
      var alert_text = "";
      var category = document.forms["teaching-upload"]["category"].value;
      if (category == null || category == "") {
        alert_text="Please add a category for the teaching!\n\n";
      }
      var title = document.forms["teaching-upload"]["title"].value;
      if (title == null || title == "") {
        alert_text=alert_text+"Please add a title for the teaching!\n\n";
      }                                                    
      var filename = document.forms["teaching-upload"]["filename"].value;
      if (filename == null || filename == "") {
        alert_text=alert_text+"Please add a file for the teaching!";
      }
      
      if(alert_text == null || alert_text == ""){
        var teacher = document.forms["teaching-upload"]["teacher"].value; 
        if(teacher == null || teacher == ""){
          confirm("Are you sure you do not want to add a teacher for this teaching?");
        }
      } else {
        alert(alert_text);
        return false;
      }
    }
  </script>
  
  <style>
  .clean_table { width:100%; border-collapse:collapse; }
  .clean_table th { text-align:left; font-weight:bold; font-family:'Bitter'; color:#5a5a5a; border-bottom:1px solid #5a5a5a; }
  .clean_table th#dwnld { width:90px; }
  .clean_table th#date, .clean_table th#dead, .clean_table th#cost { text-align:center; }
  .clean_table td { padding:5px 10px 5px 0; text-align:left; font-family:'PT Sans Narrow'; }
  .clean_table td#date, .clean_table td#dead, .clean_table td#cost, .clean_table td#dwnld  { padding: 5px 10px 5px 10px; text-align:center }
  </style>


  <div align="center">  
    <ul class="tabrow" style="border:0;">
        <li class="selected menu" id="products-tab" name="products_tab"><a href="#" onclick="pptoggle('products');">Products</a></li>
        <!--li class="menu" id="quotes-tab" name="quotes_tab"><a href="#" onclick="pptoggle('quotes');">Quotes</a-->
        <!--li class="menu" id="blog-tab" name="blog_tab"><a href="#" onclick="pptoggle('blog');">Blog</a-->
	 </ul>
                               
      <div id="products">     
        <?php include("ahquilting_products.php"); ?>
      </div>
      <!--div id="quotes" hidden>
        
      </div-->  
      <!--div id="blog" hidden>
        
      </div--> 
  </div>
