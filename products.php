<?php 
  $prod_id = $_GET['p']; 
  if($prod_id){         
  $con = connect_ahq();
  $product = mysql_fetch_array(mysql_query("SELECT * FROM products WHERE id='$prod_id'"));
?>                 
  <div class="product-patch">
  <table class="product"> 
      <tr>
        <td class="product_img" rowspan="3"><div><img src="http://www.wdsolutionsonline.com/ahquilting/cust-img/<?php echo $product['image']; ?>.png"></div></td>
        <td class="product_title">
          <span class="title"><?php echo "<a href=\"?page=products&p=$prod_id\">$product[product]</a>"; ?></span>
        </td>
      </tr>
      <tr>       
        <td class="product_price">
         <div>
          <table>
            <tr>
              <td>
                <span class="price">Price: 
                <?php
                  if($product['price']==0) { echo "<b>Free!</b>"; }
                  else { echo "$".sprintf('%.2f',$product['price']); } 
                ?></span>
                <?php if($product['delivery']=="PDF") { ?>
                &nbsp;&nbsp;(sent to you as a PDF)
                <?php } else { ?>
                &nbsp;&nbsp;(plus shipping and handling)
                <?php } ?>
              </td>
              <td align="right"><?php echo $product['url']; ?></td>
            </tr>
          </table>
         </div>
        </td>
      </tr>
      <tr>
        <td class="product_desc">
          <div>
          <?php 
            echo $product['description'];
            if($product['price'] == 0 && $product['delivery'] == "PDF"){ ?>
			<p class="pdf_save"><img src="http://www.annholtequilting.com/cust-img/pdf_save.png"></p>
            <?php } ?>
            </div>
        </td>
      </tr>
    </table>              
    <div class="thread1" id="product-thread"></div>
    <div class="thread2" id="product-thread2"></div>
  </div>

<?php 
  mysql_close($con);
} else {
  include "product_header.php";
  $con = connect_ahq();
  
  // Featured products
  $products = mysql_query("SELECT * FROM products WHERE active='T' AND featured='T' ORDER BY id") or die(mysql_error());
  $prodnum = mysql_num_rows($products);
                                            
  for($i=0;$i<$prodnum;$i++){
    $id = mysql_result($products,$i,'id');
    $product = mysql_result($products,$i,'product');
    $image = mysql_result($products,$i,'image');
    $price = mysql_result($products,$i,'price');
    $url = mysql_result($products,$i,'url');    
    $description = mysql_result($products,$i,'description');
    $delivery = mysql_result($products,$i,'delivery');
  ?>
  <div class="products-patch">
    <table class="product"> 
      <tr>
        <td class="product_img" rowspan="3"><div><img src="http://www.annholtequilting.com/cust-img/<?php echo $image; ?>.png"></div></td>
        <td class="product_title">
          <span class="title"><?php echo "<a href=\"?page=products&p=$id\">$product</a>"; ?></span>
        </td>
      </tr>
      <tr>       
        <td class="product_price">
         <div>
          <table>
            <tr>
              <td>
                <span class="price">Price:
                <?php
                  if($price==0) { echo "<b>Free!</b>"; }
                  else { echo "$".sprintf('%.2f',$price); }  
                ?>
                </span>
                <?php if($delivery=="PDF") { ?>
                &nbsp;&nbsp;(sent to you as a PDF)
                <?php } elseif($delivery=="MAIL") { ?>
                &nbsp;&nbsp;(plus shipping and handling)
                <?php } elseif($delivery=="FLIP") { ?>
				&nbsp;&nbsp;(online link sent to you)
                <?php } ?>
              </td>
              <td align="right"><?php echo $url; ?></td>
            </tr>
          </table>
         </div>
        </td>
      </tr>
      <tr>
        <td class="product_desc">
          <div>
            <?php 
            if($price == 0 && $delivery = "PDF"){ $last = 235; }
            else{ $last = 365; }
            $short_desc = substr($description,0,$last);
            $last = strrpos($short_desc,' '); 
            echo substr($short_desc,0,$last);
            if(strlen($description) > strlen($short_desc)){
              echo " ... <a href=\"?page=products&p=$id\">(read more)</a>";
            } 
            if($price == 0 && $delivery == "PDF"){ ?>
        <p class="pdf_save"><img src="http://www.annholtequilting.com/cust-img/pdf_save.png"></p>
            <?php } ?>
          </div>
        </td>
      </tr>
    </table> 
    <div class="thread1" id="featured-thread"></div>
    <div class="thread2" id="featured-thread2"></div>
  </div>
  <div class="spacer_div"></div>
  <?php 
  }      
  
  // Non-Featured Items
  $products = mysql_query("SELECT * FROM products WHERE active='T' AND featured='F' ORDER BY id") or die(mysql_error());
  $prodnum = mysql_num_rows($products);
                                            
  for($i=0;$i<$prodnum;$i++){
    $id = mysql_result($products,$i,'id');
    $product = mysql_result($products,$i,'product');
    $image = mysql_result($products,$i,'image');
    $price = mysql_result($products,$i,'price');
    $url = mysql_result($products,$i,'url');    
    $description = mysql_result($products,$i,'description');
    $delivery = mysql_result($products,$i,'delivery');
  ?>
  <div class="products-patch">
    <table class="product"> 
      <tr>
        <td class="product_img" rowspan="3"><div><img src="http://www.wdsolutionsonline.com/ahquilting/cust-img/<?php echo $image; ?>.png"></div></td>
        <td class="product_title">
          <span class="title" ><?php echo "<a href=\"?page=products&p=$id\">$product</a>"; ?></span>
        </td>
      </tr>
      <tr>       
        <td class="product_price">
         <div>
          <table>
            <tr>
              <td>
                <span class="price">Price: 
                <?php
                  if($price==0) { echo "<b>Free!</b>"; }
                  else { echo "$".sprintf('%.2f',$price); } 
                ?></span>
                <?php if($delivery=="PDF") { ?>
                &nbsp;&nbsp;(sent to you as a PDF)
                <?php } else { ?>
                &nbsp;&nbsp;(plus shipping and handling)
                <?php } ?>
              </td>
              <td align="right"><?php echo $url; ?></td>
            </tr>
          </table>
         </div>
        </td>
      </tr>
      <tr>
        <td class="product_desc">
          <div>
          <?php 
            if($price == 0 && $delivery = "PDF"){ $last = 235; }
            else{ $last = 365; }
            $short_desc = substr($description,0,$last);
            $last = strrpos($short_desc,' '); 
            echo substr($short_desc,0,$last);
            if(strlen($description) > strlen($short_desc)){
              echo " ... <a href=\"?page=products&p=$id\">(read more)</a>";
            } 
            if($price == 0 && $delivery == "PDF"){ ?>
        <p class="pdf_save"><img src="http://www.annholtequilting.com/cust-img/pdf_save.png"></p>
            <?php } ?>
            </div>
        </td>
      </tr>
    </table> 
    <div class="thread1" id="featured-thread"></div>
    <div class="thread2" id="featured-thread2"></div>
  </div>
  <div class="spacer_div"></div>
  <?php 
  }      
  
  mysql_close($con);
  }
?>
