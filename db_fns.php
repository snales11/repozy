<?php
function db_connect()
{
    $host = 'localhost';
    $user = 'root';
    $pawd = '';
    $db = 'shop';
    
    $connection = mysql_connect($host,$user,$pawd);
    mysql_query("SET NAMES utf8");
    if (!$connection || !mysql_select_db($db,$connection)) 
    {
        
        return false;
    }
    return $connection;
    }
    
   function db_result_to_array($result)
{
    $res_array = array();
    
    $count = 0;
    
    while ($row = mysql_fetch_array($result))
    {
        $res_array[$count] = $row;
        $count++;
    }
    return $res_array;
}


   function get_products()
   
  {
   db_connect();
   
   $query = "SELECT * FROM tbl_products ORDER BY id DESC";
   
   $result = mysql_query($query);
   
   $result = db_result_to_array($result);
   
   return $result;
}
 
 function get_cat()
   
  { db_connect();
   
   $query = "SELECT * FROM tbl_category ORDER BY id DESC";
   
   $result = mysql_query($query);
   
   $result = db_result_to_array($result);
   
   return $result;
}
function get_product($id)
{
    db_connect();

    $query = ("SELECT * FROM tbl_products WHERE id='$id' ");

    $result = mysql_query($query);
      
    $row = mysql_fetch_array($result);
    
    return $row;
}

function get_zakaz()
    {
    db_connect();

    $query = ("SELECT count(1) FROM tbl_orders");

    $result = mysql_query($query);
      
    $row = mysql_fetch_array($result);
    
    return $row[0];
    }
    

 function get_cat_products($cat)
   
  { db_connect();
   
   $query = "SELECT * FROM tbl_products WHERE cat='$cat' ORDER BY id DESC";
   
   $result = mysql_query($query);
   
   $result = db_result_to_array($result);
   
   return $result;
   }
   
    function get_cart_cat($id)
    
     {
 
    db_connect();
   
   $query = "SELECT name FROM tbl_category WHERE id='$id'";// ORDER BY id DESC";
   
   $result = mysql_query($query);
   
   $result = mysql_fetch_array($result);
   
   return $result;
    }
    
    function get_id($title)
{
    db_connect();

   $query = ("SELECT id FROM tbl_products WHERE title='$title' ");

   $result = mysql_query($query);
   
   $result = mysql_fetch_array($result);
   
   return $result;
}
   
?>