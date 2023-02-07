<?php
require_once "config.php";
$username=$password="";
$username_err=$password_err="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    //CHECK IF USERNAME IS EMPTY
    if(empty(trim($_POST["username"])))
    {
        $username_err="User cannot be blank";
    }
    else
    {
        $sql="SELECT username FROM signupf WHERE username=?";
        $stmt = mysqli_prepare($link , $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"s",$param_username);

            //set the values of param username
            $param_username=trim($_POST['username']);

            //try to execute this statement
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    $username_err="This username is already taken";
                }
                else
                {
                    $username=trim($_POST['username']);
                }
            } 
            else
            {
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);


//For password
if(empty(trim($_POST['password'])))
{
    $password_err="Password cannot be blank";
}
elseif(strlen(trim($_POST['password']))<6)
{
    $password_err="Password cannot be less than 6 characters";
}
else
{
    $password=trim($_POST['password']);
}

//if databasse were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err))
{
    $sql="INSERT INTO signupf (username,password) values(?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);

        //set the parameters
        $param_username=$username;
        $param_password=password_hash($password,PASSWORD_DEFAULT);

        //try to execute the query
        if(mysqli_stmt_execute($stmt))
        {
            header("location: loginf.php");
        }
        else
        {
            echo "Somthing went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>





<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="signup.css">
    </head>
    <body>
        <div class="sign-up-formf">
            <img src="image\user-icon.png" alt="Avatar">
            <h1>Sign Up</h1>
            <form action="" method="POST">
                <input type="text" class="input-box" placeholder="Username" name="username">
                <input type="text" class="input-box" placeholder="Password" name="password">
                <input type="text" class="input-box" placeholder="Contact No." name="contactno"><br>
                <button type="signup" class="signup-btn">Sign Up</button>
                <hr>
                <p class="or">Or</p>
                <p>Do you have Account?</p>
                <button type="login" class="signup-btn">Log in</button>
            </form>
        </div>
    </body>
</html>