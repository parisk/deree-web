<?php
require_once("inc/config.php");
include(ROOT_PATH . "inc/db.php");
$page_title = "ABC Co Products";
$page="products.php";
include(ROOT_PATH . "inc/header.php");
require_once("inc/db_functions.php");
?>
<body>

<?php include(ROOT_PATH . "inc/navigation.php"); ?>

    <div class="container">
        <div class="starter-template">
            <h1>Our Products <?php echo $_GET ['category']; ?></h1>
            <div class="row">

                <?php
                //   $products = get_all_products();
                   if (isset($_GET ['category']))
                       $products = get_products_by_category($_GET ['category']);
                       else
                       if (isset ($_GET ['all']) && $_GET['all']==1)
                        $products = get_all_products();
                        else
                       $products = get_latest_products();

                foreach ($products as $product) {
                ?>
                <div class="col-lg-4">
                    <img class="img-rounded"
                         src="images/<?php echo $product['image']?>"
                         alt="Generic placeholder image"
                         height="140" width="140">
                    <h2><?php echo $product["pname"]; ?></h2>
                    <p><?php echo $product["description"] ?> </p>
                    <p><?php echo $product["price"] . " Euros" ?> </p>
                    <p><a class="btn btn-default" href="#" role="button">
                            View details »</a></p>
                </div><!-- /.col-lg-4 -->

                <?php }  ?>
            </div> <!-- /.row -->
        </div>
    </div><!-- /.container -->

<?php include(ROOT_PATH . "inc/footer.php"); ?>