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
            <h1>Login</h1>
            <?php
               if (isset($_POST['login'])) {
                   $try_email = $_POST['email'];
                   $try_password = $_POST['password'];
                 try {
                     $stmt =
                         $db->prepare("select fullname, email, isadmin
                                 from users
                                 where email=?
                                    and password=?
                                    and active='Y'");

                     $stmt->bindParam(1, $try_email);
                     $stmt->bindParam(2, $try_password);
                     $stmt->execute();
                     $count = $stmt->rowCount();
                     $userInfo = $stmt->fetch();
                   //  echo "USER=" . $data['fullname'] . "<br>";
                   //  echo "email=" . $data['email'] . "<br>";
                     $_SESSION["username"] = $userInfo['fullname'];
                     $_SESSION["admin"] = $userInfo["isadmin"];
                     echo '<META HTTP-EQUIV="Refresh" Content="1; URL=index.php">';
                 } catch (PDOException $e) {
                       echo "query error.." . $e;
                   }
               }
            ?>
            <div class="formBorder">
            <form action="login.php" method="POST">
            Email <input type="email" id="email" name="email" />
            Password <input type="password" id="password" name="password"/>
            <input type="submit" id="login" name="login" value="LOGIN"/>
            </form>
                <br/>
            <h3> New User? <a href="signup.php">Sign up here</a></h3>
            </div>
           <br/>

            <div id="msg"><?php  if (isset($_POST['login']) & ($count==0)) echo "invalid username / password";
                else if (isset($_POST['login']) & ($count>0)) echo "Login Successful"; ?></div>
        </div>
    </div><!-- /.container -->

<?php include(ROOT_PATH . "inc/footer.php"); ?>

