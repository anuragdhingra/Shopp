<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>


    <!-- Page Content -->
    <div class="container">
<hr>
      <header>
            <h1 class="text-center">Login</h1>
            <h4 class="text-center bg-warning" ><?php display_message(); ?></h4>

        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" >
                </div>
                <?php login_user(); ?>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        

      <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
