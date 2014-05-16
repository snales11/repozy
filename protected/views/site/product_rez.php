<?php
 $id = $_GET['id']; 
 $product = get_product($id);
 
  ?>
  <script type="text/javascript">
  
  
  </script>
  <div class="right">  
  
   	<img align="left" style="padding: 5px 10px 5px 5px;" src="images/tovar/<?php echo $product['image']?> " alt="<?php echo $product['title'] ?>" width="210" class="items" />

   <div id="title"><?php echo $product['title']?></div> 
   <div class="price">Цена: <?php echo +$product['price'];?>$</a></div>
   <div id="description"><?php echo $product['description']?></div>
   <br />
   <div><a href="index.php?r=orders/index&str=<?php echo $product['id']?>"><img src ="images/button2.gif"/></a></div>
     
 </div>

