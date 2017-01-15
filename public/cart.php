<?php require_once("../resources/config.php");?>
<?php require_once("../resources/functions.php");?>


<?php 
if(isset($_GET['add']))
{


	$query=query("SELECT * FROM products WHERE product_id =" . escape_string($_GET['add']) . "");
	confirm($query);

	while($row=fetch_array($query))
	{  

		if($row['product_quantity'] !=$_SESSION['product_'. $_GET['add']] )
       { $_SESSION['product_'. $_GET['add']] +=1;
echo "<script>window.top.location='http://localhost/ecom/public/checkout.php'</script>";
set_message("Success ! " . $_SESSION['product_'. $_GET['add']] . " x " . $row['product_title'] ." added to the cart " );}
   else
   	{ echo "<script>window.top.location='http://localhost/ecom/public/checkout.php'</script>";
   		
   	set_message("Sorry,we only have " . $row['product_quantity'] ." ". $row['product_title'] );
   		
  }

	}
}



if(isset($_GET['remove']))
{  
 if($_SESSION['product_'. $_GET['remove']]!=0)
	
  
   { 	$_SESSION['product_'. $_GET['remove']]--;
   
   	echo "<script>window.top.location='http://localhost/ecom/public/checkout.php'</script>";
   }
    else
   { 	
   	echo "<script>window.top.location='http://localhost/ecom/public/checkout.php'</script>";
    }



}
	

	if(isset($_GET['delete']))
	{
$_SESSION['product_'. $_GET['delete']] ='0';
echo "<script>window.top.location='http://localhost/ecom/public/checkout.php'</script>";

	}







function cart()
{
$ti=0;
$tsum=0;
  foreach ($_SESSION as $name => $value) {
    if( substr($name,0,8)=="product_")
    { 

$length= strlen($name);
$pid=substr($name,8,$length);
$query =query("SELECT * FROM products WHERE $value<>'0' AND product_id=" . $pid . "");
confirm($query);
 while($row=fetch_array($query))
 { $sum= $row['product_price']*$value;
   $ti=$ti + $value;
   $tsum=$tsum + $row['product_price']*$value;
$product = <<<DELIMETER
<tr>
                <td>{$row['product_title']}</td>
                <td>Rs {$row['product_price']}</td>
                <td>{$value}</td>
                <td>Rs {$sum}</td>
               <td><a class="btn btn-warning" href="cart.php?remove={$row['product_id']}"><span class="glyphicon glyphicon-minus"> </span></a>
               <a class="btn btn-success" href="cart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"> </span></a> 
               <a class="btn btn-danger" href="cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"> </span></a> </td> 
            </tr>


DELIMETER;



echo $product;
 }




    }





      }
 
    $_SESSION['total_items'] = $ti;
    $_SESSION['total_sum'] = $tsum;




}








?>