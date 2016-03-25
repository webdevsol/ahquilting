
    window.onload = disable_product_inputs;
    
    function edit_product_row(id){
      disable_product_inputs(); 
      document.getElementById("prod-name-"+id).disabled = false;
      document.getElementById("prod-sname-"+id).disabled = false;  
      document.getElementById("prod-desc-"+id).disabled = false;
      document.getElementById("prod-price-"+id).disabled = false;
      document.getElementById("prod-delivery-"+id).disabled = false;
      
      document.getElementById("prod-submit-"+id).disabled = false;
      document.getElementById("prod-submit-"+id).className = "button edit-db-submit";
      
      document.getElementById("prod-edit-"+id).hidden = true;
      document.getElementById("prod-cancel-"+id).hidden = false;                 
      document.getElementById("prod-remove-img-"+id).className = "removeImg";    
      document.getElementById("prod-feat-img-"+id).className = "featuredImg";
      document.getElementById("prod-act-img-"+id).className = "activeImg"; 
      document.getElementById("prod-img-"+id).className = "imageImg";
      
      document.getElementById("prod-url-"+id).style.opacity = 1;
      
      var prod_url_inputs = document.getElementById("prod-url-"+id).getElementsByTagName("input");
      for(var k = 0; k < prod_url_inputs.length; k++){
        prod_url_inputs[k].disabled = false;              
        prod_url_inputs[k].style.cursor= "pointer";  
      }                                                               
      var prod_url_a = document.getElementById("prod-url-"+id).getElementsByTagName("a");
      for(var k = 0; k < prod_url_a.length; k++){
        prod_url_a[k].setAttribute("onclick","return true");  
        prod_url_a[k].style.cursor= "pointer";  
      }
      
      document.getElementById("prod-remove-"+id).setAttribute("onclick","return confirm('Are you sure you want to remove this product?')"); 
      document.getElementById("prod-feat-"+id).setAttribute("onclick","return true");   
      document.getElementById("prod-act-"+id).setAttribute("onclick","return true");   
      return false;
    }
    
    function disable_product_inputs(){   
      var all_inputs = document.getElementsByClassName("editable");
      for(var i = 0; i < all_inputs.length; i++){
        all_inputs[i].disabled = true;
      }
      
      var all_buttons = document.getElementsByClassName("button");
      for(var i = 0; i < all_buttons.length; i++){
        all_buttons[i].disabled = true;
      }
      
      var all_submits = document.getElementsByClassName("edit-db-submit");
      for(var i = 0; i < all_submits.length; i++){
        all_submits[i].className = "button-disabled edit-db-submit";
        all_submits[i].disabled = true;
      }
      
      var all_urls = document.getElementsByClassName("prod-url");
      for(var i = 0; i < all_urls.length; i++){
        all_urls[i].style.opacity = 0.4;       
        var all_url_inputs = all_urls[i].getElementsByTagName("input");
        for(var j = 0; j < all_url_inputs.length; j++){
          all_url_inputs[j].disabled = true;         
          all_url_inputs[j].style.cursor = "context-menu";        
        }                                                 
        var all_url_a = all_urls[i].getElementsByTagName("a");         
        for(var j = 0; j < all_url_a.length; j++){
          all_url_a[j].setAttribute("onclick","return false");
          all_url_a[j].style.cursor = "context-menu";        
        }       
      }
      
      var all_removeIMG = document.getElementsByClassName("removeImg");
      for(var i = 0; i < all_removeIMG.length; i++){
        all_removeIMG[i].className = "disabledRemoveImg";
      }                       
             
      var all_activeIMG = document.getElementsByClassName("activeImg");
      for(var i = 0; i < all_activeIMG.length; i++){
        all_activeIMG[i].className = "disabledActiveImg";
      }
      
      var all_featuredIMG = document.getElementsByClassName("featuredImg");
      for(var i = 0; i < all_featuredIMG.length; i++){
        all_featuredIMG[i].className = "disabledFeaturedImg";
      }
                                   
      var all_imageIMG = document.getElementsByClassName("imageImg");
      for(var i = 0; i < all_imageIMG.length; i++){
        all_imageIMG[i].className = "disabledImageImg";
      }
      
      var all_removeHREF = document.getElementsByClassName("removeHref");
      for(var i = 0; i < all_removeHREF.length; i++){
        all_removeHREF[i].setAttribute("onclick","return false");
      }
      
      var all_cancels = document.getElementsByClassName("cancel-pic");
      for(var i = 0; i < all_cancels.length; i++){
        all_cancels[i].hidden = true;
      }
      
      var all_edits = document.getElementsByClassName("edit-pic");
      for(var i = 0; i < all_edits.length; i++){
        all_edits[i].hidden = false; 
      }
      
      return false;
    }
