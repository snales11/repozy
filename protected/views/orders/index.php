

<form action="" method="post" id="cart-form">
<div><h2 align="center">Оформление заказа:</h2></div><div>
<br />
<?php  $str = $_GET["str"]; if ($str != "") {  ?>
<table align="center" cellspacing="0" cellpadding="0">
   
<tr>
<th bgcolor="#CDCDCD">Товар</th>
<th bgcolor="#CDCDCD">Цена</th>
<th bgcolor="#CDCDCD">Категория</th>
 </tr>
      <?php 
     
     $str = $_GET["str"];
     $mas = array();
      $mess = '';
     $tozap = ',';
   //   echo strlen($str);
      $i = 0; $sum = 0;
    //  echo $str;
      while ($i != strlen($str))
      { 
        $mas[$i] = $str[$i]+0;
       if ($i == (strlen($str)-1)) {$tozap = '.';}
          
         $id=$mas[$i];  
      $product = get_product($id);
        $mess= $mess.$product['title'].$tozap.' ';
      $cat = $product['cat'];
       $cat1 = get_cart_cat($cat);
       $sum +=$product['price']; ?>
    <tr bgcolor="#E4E4E4" align="center">
        <td width="300" height="30" align="center"><?php echo $product['title']; ?></td>
        <td width="200" height="30" align="center"><?php echo $product['price']; ?>$</td>
        <td width="200" height="30" align="center"><?php echo $cat1['name']; ?></td>                                                                                  
   </tr>
      <?php    $i +=1; }?>
</table>

</form>
<br />
<p align="center">Сумма за все покупки: <?php echo $sum; ?> $ </p>
<br />

<br />
<?php
        $from = "Электронный магазин ЭТ";
        $title = 'Заказ в Электронном магазине ЭТ'; 
        $message = "В нашем электронном магазине Вы заказали следующие товары: " . $mess."На сумму: ".$sum." $.";
        
 if (Yii::app()->user->isGuest) 
 
 { ?>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Введите Ваше имя:
    <input type="text" name="name" size="20" />
<br /><br />
    Введите Вашу фамилию:
    <input type="text" name="f_name" size="20" />
  <br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Введите Ваш e-mail:
    <input type="text" name="email" size="20" />
    <br /> <br /> 
    <p align="center"> <input type="submit" name="orderbut" value="Заказать"> </p>   
   
    <?php 
    
    function check_form($name,$fname,$email)
   { 
     if (strpos($email, '@')===false) return false; 
     if ((strlen($name)<5)||(strlen($fname)<5)||(strlen($email))<5) return false;
  
    return true;
   }
        
    if (isset($_POST['orderbut']))
     {       
        $name = trim(strip_tags($_POST['name']));
        $f_name = trim(strip_tags($_POST['f_name']));
        $email = trim(strip_tags($_POST['email'])); 
      
  
   $k=false;   
       
     $k=check_form($name,$f_name,$email);
          if (!$k) echo "Ошибка. Вы неправильно ввели данные "; else{
          $j = 0;
      while ($j != strlen($str))
      {
        $i = get_zakaz();
        if ($i !=0 ) {$i++;}
          
           $model = new Orders;
          
          $id=$mas[$j]; 
                    
        $product = get_product($id);
             
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
         $model->id =  $i;
         $model->name = $name;
         $model->fname = $f_name;
         $model->idprod = $product['id'];
         $model->product = $product['title'];
         $model->price = $product['price'];
         $model->email = $email;
         $model->date = $date;
         $model->time = $time;
         $model->save();   
         
       
          
    //   echo $name.' '.$f_name.' '.$email.' '.$product['id'].' '.$product['title'].' '.$product['price'].' '.$date.' '.$time.'<br />';
    
       //   $query = mysql_query("INSERT INTO tbl_orders(id,product, product_id, price,name,f_name,email,date,time) VALUES ('$i',{$product['title']}','{$product['id']}',{$product['price']},'$name','$f_name','$email','$date','$time')");
        $j++;
     
        }
         $to = $email;
         mail($to, $title, $message, 'From:'.$from);
         header("Location: http://localhost/shop/glav/index.php?r=site/final&message=1");
       }       
 }} ?>
      
    <?php
    ; 
    if ((!Yii::app()->user->isGuest)&&(Yii::app()->user->name !== 'admin')) 
    
    { ?>
         <p align="center"> <input type="submit" name="orderbut" value="Заказать"> </p>   
     <?php if (isset($_POST['orderbut']))
     {  
       
      $name = Yii::app()->user->name;
      $f_name = Yii::app()->user->lastname;
      $email = Yii::app()->user->email;
       
        $j = 0;
          
      while ($j != strlen($str))
      {
        $i = get_zakaz();
        if ($i !=0 ) {$i++;}
     
          
           $model = new Orders;
          
          $id=$mas[$j]; 
                    
        $product = get_product($id);
             
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
         $model->id =  $i;
         $model->name = $name;
         $model->fname = $f_name;
         $model->idprod = $product['id'];
         $model->product = $product['title'];
         $model->price = $product['price'];
         $model->email = $email;
         $model->date = $date;
         $model->time = $time;
         $model->save();   
          
   //     echo $name.' '.$f_name.' '.$email.' '.$product['id'].' '.$product['title'].' '.$product['price'].' '.$date.' '.$time.'<br />';
    
       //   $query = mysql_query("INSERT INTO tbl_orders(id,product, product_id, price,name,f_name,email,date,time) VALUES ('$i',{$product['title']}','{$product['id']}',{$product['price']},'$name','$f_name','$email','$date','$time')");
        $j++;
        }
        
         $to = $email;
         mail($to, $title, $message, 'From:'.$from);
         header("Location: http://localhost/shop/glav/index.php?r=site/final&message=1");
        }
           
    }} else echo('<p align="center">Ваша корзина пуста</p>')  ?>
