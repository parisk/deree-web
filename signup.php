<?php
require_once("inc/config.php");
include(ROOT_PATH . "inc/db.php");
$page_title = "ABC Co Login";
$page="login.php";
include(ROOT_PATH . "inc/header.php");
?>
<body>
<style>
    .formBorder {
        padding: 30px 15px;
        margin: 30px 5px;
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
        border-radius: 4px;
    }

</style>
<?php include(ROOT_PATH . "inc/navigation.php"); ?>

    <div class="container">
        <div class="starter-template">
            <h1>Sign-up with us!</h1>
            <?php
               if (isset($_POST['signup'])) {
                   $try_fullname = $_POST['fullname'];
                   $try_email = $_POST['email'];
                   $try_password = $_POST['password'];
                   $try_vpassword = $_POST['vpassword'];
                   $try_rate = 1;
                 try {
                     $stmt =
                         $db->prepare("insert into users (fullname, email, password) VALUES (?,?,?)");
                     $stmt->bindParam(1, $try_fullname, PDO::PARAM_STR);
                     $stmt->bindParam(2, $try_email, PDO::PARAM_STR);
                     $stmt->bindParam(3, $try_password, PDO::PARAM_STR);
                     $stmt->execute();
                     $count = $stmt->rowCount();

                     if ($count>0) echo "User Created! ";
                     else echo "Error creating user. Try again ...";
                 } catch (PDOException $e) {
                       echo "some insert error..." ;
                   }
               } else {
            ?>
                   <div class="formBorder">
            <form class="form-horizontal" action="signup.php" method="POST">
                <div class="form-group"><label for="fullname" class="control-label col-xs-2">Full Name</label>
                    <div class="col-xs-10"><input type="text" id="fullname" name="fullname" class="form-control"/> </div></div>
                <div class="form-group"><label for="email" class="control-label col-xs-2">email</label>
                    <div class="col-xs-10"><input type="email" id="email" name="email" class="form-control"/></div></div>
                <div class="form-group"><label for="password" class="control-label col-xs-2">Password</label>
                    <div class="col-xs-10"><input type="password" id="password" name="password" class="form-control"/></div></div>
                <div class="form-group"><label for="vpassword" class="control-label col-xs-2">Verify Password</label>
                    <div class="col-xs-10"><input type="password" id="vpassword" name="vpassword" class="form-control"/></div></div>
                <div class="form-group"><button type="submit" id="signup" name="signup" value="Sign-Up" class="btn btn-primary">Sign-up</button><br /></div>
            </form>
                   </div>
           <br/>
             <?php } ?>
        </div>
    </div><!-- /.container -->

<?php include(ROOT_PATH . "inc/footer.php"); ?>

