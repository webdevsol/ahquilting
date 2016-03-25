<?php
  $con = connect_mysqli("cust");
  $products = mysqli_query($con,"SELECT * FROM products ORDER BY `id`") or die(mysqli_error($con));
?>
                                                                                                                                               
<script src="http://www.wdsolutionsonline.com/ahquilting/js/product_edit.js" type="text/javascript"></script>

<style>

.edit-pic, .cancel-pic {
    cursor:pointer;
}

.disabledRemoveImg{ opacity: 0.4; filter: alpha(opacity=40); cursor:default; }
.removeImg{ opacity: 1; filter: alpha(opacity=100); cursor:hand; }
   
.disabledActiveImg{ opacity: 0.4; filter: alpha(opacity=40); cursor:default; }
.activeImg{ opacity: 1; filter: alpha(opacity=100); cursor:hand; }
              
.disabledFeaturedImg{ opacity: 0.4; filter: alpha(opacity=40); cursor:default; }
.featuredImg{ opacity: 1; filter: alpha(opacity=100); cursor:hand; }
                                                                     
.disabledImageImg{ opacity: 0.4; filter: alpha(opacity=40); cursor:default; }
.imageImg{ opacity: 1; filter: alpha(opacity=100); cursor:hand; }      

</style>
            
<table id="products-table" class="snapshot-pages" style="width:1040px;">
  <thead>
  <tr>
    <th></th>
    <th>Product</th>
    <th>Description</th>    
    <th>Image</th>   
    <th style="width:75px;">Price</th>       
    <th>Delivery Method</th>    
    <th colspan="2"></th>       
    <th colspan="2"></th>       
    <th></th>  
  </tr>
  </thead>
  <tbody>
  <?php
    while($product = mysqli_fetch_array($products)){
  ?>
    <form id="prod-<?php echo $product['id']; ?>" class="prod-form" action="http://dashboard.wdsolutionsonline.com/useradmin.php?page=ahquilting/ahquilting_submit" method="post">
    <tr>
      <td><?php echo $product['id']; ?></td>
      <td><input class="editable" type="text" name="name-<?php echo $product['id']; ?>" id="prod-name-<?php echo $product['id']; ?>" value="<?php echo $product['product']; ?>" style="margin-bottom:15px;" size="60">
      <br>Short Name: <input class="editable" type="text" name="sname-<?php echo $product['id']; ?>" id="prod-sname-<?php echo $product['id']; ?>" value="<?php echo $product['short_product'];?>" size="50"></td>    
      <td><textarea class="editable" rows="7" cols="40" name="desc-<?php echo $product['id']; ?>" id="prod-desc-<?php echo $product['id']; ?>"><?php echo $product['description']; ?></textarea></td>
      <td><img class="disabledImageImg" name="img-<?php echo $product['id']; ?>" id="prod-img-<?php echo $product['id']; ?>" src="http://www.wdsolutionsonline.com/ahquilting/cust-img/<?php echo $product['image']; ?>.png" height="130"></td>
      <td colspan="2"><input class="editable" type="text" name="price-<?php echo $product['id']; ?>" id="prod-price-<?php echo $product['id'];?>" value="<?php echo sprintf("%01.2f",$product['price']); ?>" size="5">
        <select class="editable" name="delivery-<?php echo $product['id']; ?>" id="prod-delivery-<?php echo $product['id']; ?>" style="margin-left:15px;">
          <option value="PDF"<?php if($product['delivery']=="PDF"){ echo " selected"; }?>>PDF</option>
          <option value="MAIL"<?php if($product['delivery']=="MAIL"){ echo " selected"; }?>>MAIL</option>
        </select>                                      
      <div class="prod-url" id="prod-url-<?php echo $product['id']; ?>" style="margin-top:15px;text-align:center;">
      Test Link:
      <?php echo $product['url']; ?>
      <br><br>
      <a href="#">Change Link</a>
      </div>
      </td>   
      
      <td class="active">
        <a class="removeHref" href="http://dashboard.wdsolutionsonline.com/useradmin.php?page=ahquilting/ahquilting_submit&code=prod_act&id=<?php echo $product['id'];?>" id="prod-act-<?php echo $product['id']; ?>" name="act-<?php echo $product['id']; ?>" onclick="return false">
          <img class="disabledActiveImg" src="http://dashboard.wdsolutionsonline.com/images/<?php if($product['active']=="T"){ echo "eye_icon&16"; } else { echo "invisible_light_icon&16"; }?>.png" style="height:16px;" id="prod-act-img-<?php echo $product['id']; ?>" name="act-img-<?php echo $product['id']; ?>" title="Make this product <?php if($product['active']=="T"){ echo "in"; }?>visible">
        </a> 
      </td>                          
      
      <td class="featured">
        <a class="removeHref" href="http://dashboard.wdsolutionsonline.com/useradmin.php?page=ahquilting/ahquilting_submit&code=prod_feat&id=<?php echo $product['id'];?>" id="prod-feat-<?php echo $product['id']; ?>" name="feat-<?php echo $product['id']; ?>" onclick="return false">
          <img class="disabledFeaturedImg" src="http://dashboard.wdsolutionsonline.com/images/star<?php if($product['featured']=="F"){ echo "_gray"; }?>.png" style="height:16px;" id="prod-feat-img-<?php echo $product['id']; ?>" name="feat-img-<?php echo $product['id']; ?>" title="Make this a <?php if($product['featured']=="T"){ echo "non-"; }?>featured product">
        </a>
      </td>
 
      <td>
        <img class="edit-pic" id="prod-edit-<?php echo $product['id']; ?>" name="edit-<?php echo $product['id']; ?>" src="http://www.wdsolutionsonline.com/walterkaminski/img/pencil_icon&24.png" style="height:15px;" onclick="edit_product_row('<?php echo $product['id']; ?>')">
        <img class="cancel-pic" id="prod-cancel-<?php echo $product['id']; ?>" name="cancel-<?php echo $product['id']; ?>" src="http://www.wdsolutionsonline.com/walterkaminski/img/round_delete_icon&24.png" style="height:15px;" onclick="disable_product_inputs()"> 
      </td>
      
      <td class="delete">
        <a class="removeHref" href="http://dashboard.wdsolutionsonline.com/useradmin.php?page=ahquilting/ahquilting_submit&code=del_prod&id=<?php echo $product['id']; ?>" id="prod-remove-<?php echo $product['id']; ?>" name="remove-<?php echo $product['id']; ?>" onclick="return false">
          <img class="disabledRemoveImg" src="http://www.wdsolutionsonline.com/walterkaminski/img/trash_icon&24.png" style="height:15px;" id="prod-remove-img-<?php echo $product['id']; ?>" name="remove-img-<?php echo $product['id']; ?>">
        </a>
      </td>
      <td class="submit">
        <button type="submit" class="button-disabled edit-db-submit" form="prod-<?php echo $product['id']; ?>" type="submit" name="submit-<?php echo $product['id']; ?>" id="prod-submit-<?php echo $product['id']; ?>">Submit</button>
      </td>
    </tr>
    <input type="hidden" name="id" id="id" value="<?php echo $product['id']; ?>">
    <input type="hidden" name="code" id="code" value="edit_product">
    </form>
<?php } ?>
