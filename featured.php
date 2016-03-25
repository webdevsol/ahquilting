<?php
  $con = connect_ahq();
  $products = mysql_query("SELECT * FROM products WHERE featured='T' and active='T' ORDER BY id") or die(mysql_error());
  
  $prodnum = mysql_num_rows($products);
  
  $randID = rand(0,($prodnum-1));
    
  $id = mysql_result($products,$randID,'id');
  $product = mysql_result($products,$randID,'product');
  $url = mysql_result($products,$randID,'url');
  $image = mysql_result($products,$randID,'image');
  $short_product = mysql_result($products,$randID,'short_product');
  $price = mysql_result($products,$randID,'price');
  $description = mysql_result($products,$randID,'description');
   
  mysql_close($con);
?>
        
<div class="featured_prod_header"><?php echo "Featured Product"; ?></div>
<div class="featured_product">
  <table>                                                     
    <tr>
      <td class="featured_img"><img src="http://www.wdsolutionsonline.com/ahquilting/cust-img/<?php echo $image; ?>_thumb.png"></td>
      <td class="featured_cont">
        <div class="featured_prod"><a href="?page=products&p=<?php echo $id; ?>"><?php echo $short_product; ?></a></div>
        <div class="featured_price">Price: 
        <?php
          if($price==0) { echo "<b>Free!</b>"; }
          else { echo "$".sprintf('%.2f',$price); }  
        ?>
        </div>
        <div class="link"><?php echo $url; ?></div>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="featured_desc">                                   
      <span class="header">Description:</span><br>
      <?php echo $description; ?>
      <br>
      </td>
    </tr>
  </table>
</div>
<div class="featured_all"><a href="?page=products">View All Products</a></div>