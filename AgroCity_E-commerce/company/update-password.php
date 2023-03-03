<?php include('partitals/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br/>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="post">
            <table class="tbl">
                <tr>
                    <td><input type="password" name="current_password" class="input-box" placeholder="Current Password"></td>
                </tr>
                <tr>
                    <td><input type="password" name="new_password" class="input-box" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td><input type="password" name="confirm_password" class="input-box" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-third">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php

    if(isset($_POST['submit']))
    {
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);

        //check current password is exists or not
        $sql="SELECT * FROM company WHERE id=$id AND password='$current_password'";

        $res=mysqli_query($conn, $sql);

        if($res==true)
        {
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //echo "user found";
                if($new_password==$confirm_password)
                {
                    //echo "password match";
                    $sql2="UPDATE company SET 
                    password='$new_password'
                    WHERE id=$id
                    ";

                    $res2=mysqli_query($conn,$sql2);

                    if($res2==true)
                    {
                        $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully!!.</div>";
                        header("location:".SITEURL.'company/manage-company.php');
                    }
                    else
                    {
                        $_SESSION['change-pwd']="<div class='error'>Failed to Password Change!!</div>";
                        header("location:".SITEURL.'company/manage-company.php');
                    }
                }
                else
                {
                    $_SESSION['pwd-not-match']="<div class='error'>Password Not Match.</div>";
                    header("location:".SITEURL.'company/manage-company.php');
                }
            }
            else
            {
                $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>";
                header("location:".SITEURL.'company/manage-company.php');
            }
        }
    }

?>