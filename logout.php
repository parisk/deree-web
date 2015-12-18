<?php
require_once("inc/config.php");
include(ROOT_PATH . "inc/db.php");
$page_title = "ABC Co Login";
$page="login.php";
include(ROOT_PATH . "inc/header.php");
?>
<body>

<?php include(ROOT_PATH . "inc/navigation.php"); ?>

    <div class="container">
        <div class="starter-template">
            <h1>Logout Successful</h1>
            <?php
            unset($_SESSION["username"]);
            session_destroy();
            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';?>



        </div>
    </div><!-- /.container -->

<?php include(ROOT_PATH . "inc/footer.php"); ?>

