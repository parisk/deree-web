<?php
require_once("inc/config.php");
include(ROOT_PATH . "inc/db.php");
$page_title = "ABC Co Search Results";
$page="search.php";
include(ROOT_PATH . "inc/header.php");
?>
<body>

<?php include(ROOT_PATH . "inc/navigation.php"); ?>

    <div class="container">
        <div class="starter-template">
            <h1>You searched for:<?php
               echo $_GET ["search"];
                ?> </h1>

            <div class="row">

                <?php
                 $products =search($_GET ["search"]);
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
            <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
        </div>
    </div><!-- /.container -->

<?php include(ROOT_PATH . "inc/footer.php"); ?>