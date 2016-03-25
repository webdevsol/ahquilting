<div class="contentContainer">
    <table id="allContent">
        <tr>
            <td id="sideNavMenu" valign="top">
                <ul>
                    <?php
                      $con = connect_ahq();
                      $menu = mysql_query("SELECT * FROM mainmenu ORDER BY dispor") or die(mysql_error());
                      $mmnum = mysql_num_rows($menu);
                                            
                      for($i=0;$i<$mmnum;$i++){
                        $mmdispor = mysql_result($menu,$i,'dispor');
                        $mmpage = mysql_result($menu,$i,'page');
                        $mmdisplay = mysql_result($menu,$i,'display');
                        $mmactive = mysql_result($menu,$i,'active');
                        
                        if($mmpage=="home"){
                          $link ="index.php";
                        } else {
                          $link = "?page=".$mmpage;
                        }
                        
                        if($mmactive=="ACTIVE"){
                          if(($mmpage==$page) || ($_GET['page']==NULL && $mmpage=="splash")){
                            echo "<a href=\"".$link."\"><li id=\"sideNavMenuSelected\">".$mmdisplay."</li></a>"; 
                          } else {
                            echo "<a href=\"".$link."\"><li>".$mmdisplay."</li></a>";
                          }  
                        }
                      }
                      
                      mysql_close($con);
                    ?>
                </ul>
            
            </td>
            <td id="contentSpacer"><img src="images/spacer.gif"></td>
            <td id="mainContent" valign="top">       
              <?php 
              if($page!="home" && $page!="gallery" && $page!="forum" && $page!="products") { 
                echo "<h1 class=\"page_header\">$pagedisplay</h1>";  
              } 
              elseif($page == "products"){ 
                echo "<h1 class=\"page_header\"><a href=\"?page=products\">$pagedisplay</a>";
                $id = $_GET['p'];
                if($id){
                $con = connect_ahq();
                $prod = mysql_fetch_array(mysql_query("SELECT product FROM products WHERE id='$id'"));
                mysql_close($con);
                $name = $prod['product'];
                echo "<span> :: <a href=\"?page=products&p=$id\">$name</a></span>";
                } 
                echo "</h1>";
              } ?>
                <?php
                  if(file_exists($page.".php")){
                    include($page.".php");
                  } else {
                    echo "The requested page does not exist, please select a page from the menu bar.";
                  }
                ?>
            </td>
        </tr>
    </table>
</div>        
