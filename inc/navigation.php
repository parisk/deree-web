<?php include_once("db_functions.php");
$categories = get_all_categories();
//var_dump($categories);
?>

<style>
    /* hide the search form until the screen gets more than 1020px */
    @media (max-width: 1020px) {
        .navbar-form{
            display: none!important;
        }
    }
    /* To gain space... I hide the logo between 768 and 1180 so that the menu fits well */
    @media (min-width: 768px) and (max-width: 1180px) {
        .navbar-brand{
            display: none!important;
        }
    }
</style>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Maira's Store</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if ($page == "index.php") { ?>
                     class="active"
                    <?php } ?>
                ><a href="../index.php">Home</a></li>

               <li <?php if ($page == "products.php") { ?>
                    class="active dropdown"
                <?php } else ?> class="dropdown"
                    > <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-
                         haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../products.php?all=1"> All Products </a></li>
                        <li><a href="../products.php"> Latest Products </a></li>
                      <?php foreach ($categories as $category) { ?>
                        <li><a href="../products.php?category=<?php echo $category ['id']; ?>">
                                <?php echo $category ['cname']; ?></a></li>
                       <?php } ?>  </ul>
                </li>

                <li <?php if ($page == "contact.php") { ?>
                    class="active"
                <?php } ?>
                    ><a href="../contact.php">Contact us</a></li>

                <li <?php if ($page == "about.php") { ?>
                    class="active"
                <?php } ?>
                    ><a href="../about.php">About</a></li>


               <li <?php if ($page == "login.php" || $page== "logout.php") { ?>
                    class="active"
                <?php }
                    if (isset($_SESSION["username"])) { ?>
                    ><a href="../logout.php">Logout</a></li>
                    <?php } else  { ?>
                    ><a href="../login.php">Login/Sign-up</a></li>
                    <?php } ?>

                <?php if ($_SESSION ["admin"] == 'Y') { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-
                       haspopup="true" aria-expanded="false">Admin Menu <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Manage Users</a></li>
                        <li><a href="#">Manage Products</a></li>
                        <li><a href="#">Manage Categories</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li> <?php } ?>
            </ul>

            <form method="GET" action="../search.php" class="navbar-form navbar-right">
                <div class="form-group">
                    <input placeholder="Search" id="search" name="search" class="form-control" type="text">
                </div>

                <button type="submit" class="btn btn-success">Search</button>
            </form>


        </div><!--/.nav-collapse -->
    </div>
</nav>