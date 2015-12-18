<?php
require_once("inc/config.php");
include(ROOT_PATH . "inc/db.php");
$page_title = "ABC Co Home Page";
$page="index.php";
include(ROOT_PATH . "inc/header.php");
?>
<body>

<?php include(ROOT_PATH . "inc/navigation.php"); ?>

    <div class="container">
        <div class="starter-template">
            <h1>Bootstrap starter template</h1>
            <?php if (isset($_SESSION ['username'])) echo "Welcome, " . $_SESSION ['username']; ?>
            <?php if (isset($_SESSION ['admin'])) echo "Admin Menu is :  " . $_SESSION ['admin']; ?>
            <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
        </div>
    </div><!-- /.container -->

<?php include(ROOT_PATH . "inc/footer.php"); ?>