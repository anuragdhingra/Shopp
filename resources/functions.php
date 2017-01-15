<?php


//helper functions

function set_message($msg)
{
if(!empty($msg))
{
    $_SESSION['message']=$msg;
}

}


function display_message()
{
    if(isset($_SESSION['message']))
    {    $sorry= $_SESSION['message'];
        echo"'<div class='alert alert-success fade in' id='success-alert'> <a id='myWish' onload='fadeit()' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  $sorry</div>' ";
        unset($_SESSION['message']);
    }
}







function redirect($location)
{
	header("Location : $location");
}

function query($sql)
{   global $connection;
	return(mysqli_query($connection,$sql));
}

function fetch_array($result)
{
	return mysqli_fetch_array($result);
}




function confirm($result)
{  global $connection;
	if(!$result)
	{
		die("Query failed" . mysqli_error($connection));
	}

}


function escape_string($string)
{
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}



// get products function

function get_product()
{
	$send_query = query("SELECT * FROM products");
	confirm($send_query);
	
	while($row = fetch_array($send_query))
	{
		$product = <<<DELIMETER
		 <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                         <a  href="../public/item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">Rs {$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_self" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                <a class="btn btn-primary" target="_self" href="cart.php?add={$row['product_id']}">Add to cart</a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>




DELIMETER;
echo $product;
	  
	}
   


}

//categories

function get_category()
{
      $send_query = query("SELECT * FROM categories");
      confirm($send_query);
                    
                    while($row = fetch_array($send_query))
                    {   $category = <<<DELIMETER
                        <a href='../public/category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMETER;
echo $category;

                    }


}


function login_user()

{  
    if(isset($_POST['submit']))
    { 
       $username = escape_string($_POST['username']);
       $password = escape_string($_POST['password']);
       $query= query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
       confirm($query);

if(mysqli_num_rows($query) == 1)
{   
    echo "<script>window.top.location='http://localhost/ecom/public/admin'</script>";
    
}
else
    { 
set_message("Username or Password is incorrect");
echo "<script>window.top.location='http://localhost/ecom/public/login.php'</script>";

    }

}

}


?>
