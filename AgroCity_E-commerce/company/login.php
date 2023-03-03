<?php
    include('../config/constant.php');
?>
<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/company.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <div class="sign-in-formc">
        <img src="../images/user-icon1.png" alt="Avatar">

            <h1 class="text-center">Login </h1><br>
           
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }
            ?>
            <!-- login form starts  -->
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" class="input-box" name="username" placeholder="Enter Username">
                Password: <br>
                <input type="password" class="input-box" name="password" placeholder="Enter Password">
                <input type="submit" class="signin-btn" name="submit" value="Login" class="btn-primary"><br><br>
            </form>
            <!-- login form ens  -->


           
            <p class="text-center">All rights reserved <a href="#">&copy;AgroCity</a></p>
        </div>
        <!-- <div class="sign-in-formc">
            <img src="../images/user-icon1.png" alt="Avatar">
            <h1>Login </h1>


            <p>All rights reserved <a href="#">&copy;AgroCity</a></p>
            <form>
                <input type="text" class="input-box" placeholder="Email">
                <input type="text" class="input-box" placeholder="Password"><br>
                <input type="submit" name="submit" value="Log in" class="signin-btn">
            </form>
        </div> -->
    </body>
</html>
<?php
   
    //check submit is working or not
    if(isset($_POST['submit']))
    {
        //process for login form
        //1.get from login from
        $username = $_POST['username'];
        $passwors = md5($_POST['password']);


        //2.check to check user and passwors exist or not
        $sql = "SELECT * FROM company WHERE username='$username' AND password='$passwors'";
        //3.execute the query
        $res = mysqli_query($conn, $sql);


        //4. count rows to check whether the user exist or not
        $count =mysqli_num_rows($res);


        if ($count==1)
        {
            //user exists and logged in successfully
            $_SESSION['login'] = "<div class='success text-center'>  Login Successfully!! </div>";
            //redirect to home page
            header('Location:'.SITEURL.'company/');
        }
        else{
            //user not exist and logged in failed
            $_SESSION['login'] = "<div class='error text-center'>Username or password is not correct!!</div>";
            //redirect to home page
            header('Location:'.SITEURL.'company/login.php');
        }
    }


?>
