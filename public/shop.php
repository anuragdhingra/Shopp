<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
       

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-align:center;">All Products</h2>
            </div>
        </div>
        <!-- /.row -->
 <hr>
        <!-- Page Features -->
        <div class="row text-center">
<?php 
$send_query = query("SELECT * FROM products");
    confirm($send_query);
    
    while($row = fetch_array($send_query)):
?>
           
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3><?php echo $row['product_title'] ?></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id=<?php echo $row['product_id'] ?>"  class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
<?php endwhile ?>
        </div>
        <!-- /.row -->

       
</div>
 <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>